<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

use App\Category;
use App\Product;


class ProfileController extends Controller
{
    

	public function index()
    {

    	$user = User::find(1);
    	$userDob = $user->profile;

    	/*echo '<pre>';
    	print_r($userDob);*/

        /*$categories = Category::find(2);

        $dataByCategory = $categories->products;

        echo '<pre>';
        print_r($dataByCategory);*/


        /*$product = Product::find(1);
        $dataByProduct = $product->categories;

        echo '<pre>';
        print_r($dataByProduct);*/

        //Delete ManyToMany relationship data

        $category = Category::find(2);
        $product = Product::find(1);

        $product->categories()->detach($category);

        return view('products.index');

    }

    public function store()
    {

    	/*$profile = new Profile();
		$profile->dob = '9999-12-31 23:59:59';
		$profile->bio = 'A professional programmer.';
		$profile->facebook = 'facebook';
		$profile->twitter = 'twitter';
		$profile->github = 'github';

		$user = User::find(1);
		$user->profile()->save($profile);

		*/

        /*$categories = ['Office Chairs', 'Modern Chairs', 'Home Chairs'];

        foreach($categories as $category)
        {
            Category::create([
                'name'  =>  $category,
            ]);
        }*/

       /* $product = Product::create([
            'name'  =>  'Home Brixton Faux Leather Armchair',
            'price' =>  199.99,
        ]);

        $categories = Category::find([2,3]); // Modren Chairs, Home Chairs
        $product->categories()->attach($categories);*/
        

        $notification = array(
            'message' => 'Added Record!',
            'alert-type' => 'success'
        );

        return redirect('/profile')->with($notification);
    }
}
