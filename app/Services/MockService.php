<?php

// Create a mock service

namespace App\Services;

use App\Models\Argument;
use App\Models\Mock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MockService {
  public function __construct() {}

  public function getPaginatedMocks (int $pageSize = 5) {
    return Mock::latest()
      ->paginate($pageSize)
      ->through(function(Mock $item) {
        return [
          "id" => $item->id,
          "function" => $item->function,
          "name" => $item->name,
          "arguments" => $item->arguments,
        ];
      });
  }

  public function createMock (Request $request) {
      $mock = Mock::create($request->validate([
          'name' => ['required', 'max:50'],
          'function' => ['required'],
      ]));

      $arguments = $request->get('arguments');

      if ($arguments && count($arguments) > 0) {
          foreach ($arguments as $arg) {
              $validArgs = Validator::make($arg, [
                  'name' => ['required'],
                  'type' => ['required'],
              ])->validate();
              $createdArg = Argument::create([
                  ...$validArgs,
                  'mock_id' => $mock->id,
              ]);

              if (! $createdArg) {
                  $mock->delete();
                  return back()->with([
                      'success' => false,
                      'message' => "Failed to create argument"
                  ]);
              }
          }
      }
  }

  public function useMock (Mock $mock, Request $request) {
    if (count($mock->arguments) > 0) {
      $filledArguments = $request->validate([
        ...$mock->arguments->map(function($arg) {
          return [
            $arg->name => ['required']
          ];
        })
      ]);
      return fake()->{$mock->function}($filledArguments);
    }

    return fake()->{$mock->function}();
  }

  public function deleteMock (Mock $mock) {
    return $mock->delete();
  }
}
