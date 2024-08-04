<?php

namespace App\Services;

use App\Helpers\Helper;
use Parsedown;
use Symfony\Component\Yaml\Yaml;

class BlogService
{
    public function getAll($with_content = false, array $pagination = null): array
    {
      $content_path = resource_path('content/blog');
      $recursive_md_files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($content_path));
      $md_files = new \RegexIterator($recursive_md_files, '/\.md$/');

      $posts = [];

      foreach ($md_files as $file) {
        $content = file_get_contents($file->getPathname());
        
        $metadata = $this->getMarkdownFileMetadata($content);

        $post = [
          'slug' => basename($file->getPathname(), '.md'),
          'title' => $metadata['title'] ?? '',
          'metadata' => $metadata,
        ];

        if ($metadata['categories']) {
          $categories_str = array_filter(array_map('trim', explode(',', $metadata['categories'])), 'strlen');
          $post['categories'] = array_map(function (string $category) {
            return $this->getCategory($category);
          }, $categories_str);
        }

        if (isset($metadata['author'])) {
          $post['author'] = $this->getAuthor($metadata['author']);
        }

        if ($with_content) {
          $content = $this->getMarkdownContent($content);
          $Parsedown = new Parsedown();
          $Parsedown->setSafeMode(true);
          $parsed_content = $Parsedown->text($content);

          $post['content'] = $parsed_content;
        }

        if (preg_match('/^#\s+(.*)$/m', $content, $matches) && !isset($metadata['title'])) {
          $post['title'] = $matches[1];
        }

        $posts[] = $post;
      }

      if ($pagination) {
        $page = $pagination['page'] ?? 1;
        $per_page = $pagination['per_page'] ?? 25;

        $offset = ($page - 1) * $per_page;
        $posts = array_slice($posts, $offset, $per_page);
      }

      return $posts;
    }

    public function getOne(string $slug)
    {
      $post = $this->getAll(with_content: true);

      for ($i = 0; $i < count($post); $i++) {
        if ($post[$i]['slug'] === $slug) {
          return $post[$i];
        }
      }

      return null;
    }

    public function getPostsByCategory(string $category): array
    {
      $posts = $this->getAll(with_content: true);

      $filtered_posts = [];

      foreach ($posts as $post) {
        if (isset($post['categories']) && in_array($category, $post['categories'])) {
          $filtered_posts[] = $post;
        }
      }

      return $filtered_posts;
    }

    public function getPostsByCategories () {
      $categories = $this->getCategories();

      $filtered_posts = [];

      foreach ($categories as $category => $count) {
        $filtered_posts[$category] = $this->getPostsByCategory($category);
      }

      return $filtered_posts;
    }

    public function getCategoryPosts (string $category) {
      $posts = $this->getAll();

      $filtered = array_filter($posts, function ($post) use ($category) {
        return in_array($category, array_map(function ($category) {
          return $category['slug'];
        }, $post['categories']));
      });

      return $filtered;
    }


    public function getCategories()
    {
      $category_json = resource_path('content/categories.json');
      $categories = Helper::readJsonFile($category_json);

      return $categories;
    }

    public function getCategory(string $slug)
    {
      $categories = $this->getCategories();

      $filtered = array_filter($categories, function ($category) use ($slug) {
        return $category['slug'] === $slug;
      });

      return reset($filtered) ?? null;
    }

    public function getAuthors()
    {
      $author_json = resource_path('content/authors.json');
      $authors = Helper::readJsonFile($author_json);

      return $authors;
    }

    public function getAuthor(string $name)
    {
      $authors = $this->getAuthors();

      $filtered = array_filter($authors, function ($author) use ($name) {
        return $author['slug'] === $name;
      });

      return reset($filtered) ?? null;
    }

    public function getPostsByAuthors () {
      $authors = $this->getAuthors();

      $filtered_posts = [];

      foreach ($authors as $author => $count) {
        $filtered_posts[$author['slug']] = $this->getAuthorPosts($author['slug']);
      }

      return $filtered_posts;
    }

    public function getAuthorPosts (string $author) {
      $posts = $this->getAll();
      
      $filtered = array_filter($posts, function ($post) use ($author) {
        return $post['author']['slug'] === $author;
      });

      return $filtered;
    }

    private function getMarkdownContent($content)
    {
      return preg_replace('/^---\n(.+)---\n/s', '', $content);
    }

    private function getMarkdownFileMetadata($content)
    {
      $metadata = [];

      if (preg_match('/^---\n(.+)---\n/s', $content, $matches)) {
        $metadata = Yaml::parse($matches[1]);
      }

      return $metadata;
    }
}