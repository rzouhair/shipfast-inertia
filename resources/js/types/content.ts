export type articleType = {
  slug: string;
  title: string;
  categories: categoryType[];
  author: authorType;
  content: string;
  metadata: {
    description?: string;
    published_at: string;
    image: string;
    title: string;
    author: string;
    categories: string;
  }
};

export type authorType = {
  id: number;
  slug: string;
  name: string;
  job: string;
  description: string;
  avatar?: string;
};

export type categoryType = {
  id: number;
  slug: string;
  name: string;
  description?: string;
};