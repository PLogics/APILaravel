<?php 
namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces;

class PostRepository implements PostRepositoryInterface
{
	public function getAll()
	{
		return Post::all();
	}

	public function getPost($id)
	{
		return Post::findOrFails($id);
	}
}