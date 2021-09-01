<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller {

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            DB::beginTransaction();

            $post_type = $request->post_type;

            if ($post_type == 'vehicle') {
                $post_vehice_data_save = Post::create([
                            'vehicle_type' => $request->vehicle_type,
                            'vehicle_condition' => $request->vehicle_condition,
                            'vehicle_make_id' => $request->vehicle_make_id,
                            'model' => $request->model,
                            'start_type' => $request->start_type,
                            'manufactured_year' => $request->manufactured_year,
                            'price' => $request->price,
                            'on_going_lease' => $request->on_going_lease,
                            'transmission' => $request->transmission,
                            'fuel_type' => $request->fuel_type,
                            'engine_capacity' => $request->engine_capacity,
                            'millage' => $request->millage,
                            'isAc' => $request->isAc,
                            'isPowerSteer' => $request->isPowerSteer,
                            'isPowerMirroring' => $request->isPowerMirroring,
                            'isPowerWindow' => $request->isPowerWindow,
                            'additional_info' => $request->additional_info,
                ]);
            }
            if ($post_type == 'spare_part') {
                $post_spare_part_save = SparePart::create([
                            'part_condition' => $request->part_condition,
                            'part_used_in' => $request->part_used_in,
                            'part_category' => $request->part_category,
                            'part_name_brand' => $request->part_name_brand,
                            'price' => $request->price,
                            'additional_info' => $request->additional_info
                ]);
            }
            if ($post_type == 'wanted') {
                $post_wanted_data_save = Post::create([
                            'vehicle_type' => $request->vehicle_type,
                            'vehicle_condition' => $request->vehicle_condition,
                            'vehicle_make_id' => $request->vehicle_make_id,
                            'model' => $request->model,
                            'start_type' => $request->start_type,
                            'manufactured_year' => $request->manufactured_year,
                            'price' => $request->price,
                            'on_going_lease' => $request->on_going_lease,
                            'transmission' => $request->transmission,
                            'fuel_type' => $request->fuel_type,
                            'engine_capacity' => $request->engine_capacity,
                            'millage' => $request->millage,
                            'isAc' => $request->isAc,
                            'isPowerSteer' => $request->isPowerSteer,
                            'isPowerMirroring' => $request->isPowerMirroring,
                            'isPowerWindow' => $request->isPowerWindow,
                            'additional_info' => $request->additional_info,
                ]);
            }

            Post::create([
                'post_title' => $request->post_title,
                'post_type' => $request->post_type,
                'vehicle_id' => $post_vehice_data_save->vehicle_id,
                'spare_part_id' => $post_spare_part_save->spare_part_id,
                'wanted_id' => $post_wanted_data_save->wanted_id,
            ]);

            $post_id = $post_save->id;
            $random_name = uniqid($post_id);
            $request->validate([
                'main_image' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_one' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_two' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_three' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_four' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_five' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
            ]);

            //get the post to update
            $image_path_update = Post::find($post_id);

            if ($request->main_image != null) {
                $main_ext = $request->main_image->extension();
                $path_main_img = '/public/post_images' . '/' . $post_id . '/' . 'img_main' . '.' . $random_name . '.' . $main_ext;
                $open_post_img_main = Image::make($request->nic);
                $open_post_img_main->save($path_main_img, 60);
                $image_path_update->main_image = $request->main_image;
            }

            if ($request->image_one != null) {
                $image_one_ext = $request->image_one->extension();
                $path_img_one = '/public/post_images' . '/' . $post->id . '/' . 'img_one' . '.' . $random_name . '.' . $image_one_ext;
                $open_post_img_one = Image::make($request->nic);
                $open_post_img_one->save($path_img_one, 60);
                $image_path_update->image_1 = $request->image_one;
            }

            if ($request->image_two != null) {
                $image_two_ext = $request->image_two->extension();
                $path_img_two = '/public/post_images' . '/' . $post->id . '/' . 'img_two' . '.' . $random_name . '.' . $image_two_ext;
                $open_post_img_two = Image::make($request->nic);
                $open_post_img_two->save($path_img_two, 60);
                $image_path_update->image_2 = $request->image_two;
            }

            if ($request->image_three != null) {
                $image_three_ext = $request->image_three->extension();
                $path_img_three = '/public/post_images' . '/' . $post->id . '/' . 'img_three' . '.' . $random_name . '.' . $image_three_ext;
                $open_post_img_three = Image::make($request->nic);
                $open_post_img_three->save($path_img_three, 60);
                $image_path_update->image_3 = $request->image_three;
            }

            if ($request->image_four != null) {
                $image_four_ext = $request->image_four->extension();
                $path_img_four = '/public/post_images' . '/' . $post->id . '/' . 'img_four' . '.' . $random_name . '.' . $image_four_ext;
                $open_post_img_four = Image::make($request->nic);
                $open_post_img_four->save($path_img_four, 60);
                $image_path_update->image_4 = $request->image_four;
            }

            if ($request->image_five != null) {
                $image_five_ext = $request->image_five->extension();
                $path_img_five = '/public/post_images' . '/' . $post->id . '/' . 'img_five' . '.' . $random_name . '.' . $image_five_ext;
                $open_post_img_five = Image::make($request->nic);
                $open_post_img_five->save($path_img_five, 60);
                $image_path_update->image_5 = $request->image_five;
            }

            $image_path_update->save();

            DB::commit();
            return array('status' => 1, 'msg' => 'Post created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return array('status' => 0, 'msg' => 'Post creation is Unsuccessfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        $post_all = Post::all();
        return $post_all;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id) {
        $post_by_id = Post::where('id', $post_id)->first();
        return $post_by_id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id) {
        try {
            DB::beginTransaction();

            $random_name = uniqid($post_id);
            $request->validate([
                'main_image' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_one' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_two' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_three' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_four' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
                'image_five' => 'mimes:jpeg,bmp,png', // Only allow .jpg, .bmp and .png file types.
            ]);

            //get the post to update
            $post_update = Post::find($post_id);

            if ($request->main_image != null) {
                $main_ext = $request->main_image->extension();
                $path_main_img = '/public/post_images' . '/' . $post_id . '/' . 'img_main' . '.' . $random_name . '.' . $main_ext;
                $open_post_img_main = Image::make($request->nic);
                $open_post_img_main->save($path_main_img, 60);
            }

            if ($request->image_one != null) {
                $image_one_ext = $request->image_one->extension();
                $path_img_one = '/public/post_images' . '/' . $post->id . '/' . 'img_one' . '.' . $random_name . '.' . $image_one_ext;
                $open_post_img_one = Image::make($request->nic);
                $open_post_img_one->save($path_img_one, 60);
            }

            if ($request->image_two != null) {
                $image_two_ext = $request->image_two->extension();
                $path_img_two = '/public/post_images' . '/' . $post->id . '/' . 'img_two' . '.' . $random_name . '.' . $image_two_ext;
                $open_post_img_two = Image::make($request->nic);
                $open_post_img_two->save($path_img_two, 60);
            }

            if ($request->image_three != null) {
                $image_three_ext = $request->image_three->extension();
                $path_img_three = '/public/post_images' . '/' . $post->id . '/' . 'img_three' . '.' . $random_name . '.' . $image_three_ext;
                $open_post_img_three = Image::make($request->nic);
                $open_post_img_three->save($path_img_three, 60);
            }

            if ($request->image_four != null) {
                $image_four_ext = $request->image_four->extension();
                $path_img_four = '/public/post_images' . '/' . $post->id . '/' . 'img_four' . '.' . $random_name . '.' . $image_four_ext;
                $open_post_img_four = Image::make($request->nic);
                $open_post_img_four->save($path_img_four, 60);
            }

            if ($request->image_five != null) {
                $image_five_ext = $request->image_five->extension();
                $path_img_five = '/public/post_images' . '/' . $post->id . '/' . 'img_five' . '.' . $random_name . '.' . $image_five_ext;
                $open_post_img_five = Image::make($request->nic);
                $open_post_img_five->save($path_img_five, 60);
            }

            $post_update->post_type = $request->post_type;
            $post_update->vehicle_id = $request->vehicle_id;
            $post_update->spare_part_id = $request->spare_part_id;
            $post_update->wanted_id = $request->wanted_id;
            $post_update->post_title = $request->post_title;
            $post_update->vehicle_id = $request->vehicle_id;
            $post_update->spare_part_id = $request->spare_part_id;
            $post_update->main_image = $path_main_img;
            $post_update->image_1 = $path_img_one;
            $post_update->image_2 = $path_img_two;
            $post_update->image_3 = $path_img_three;
            $post_update->image_4 = $path_img_four;
            $post_update->image_5 = $path_img_five;
            $post_update->save();

            DB::commit();
            return array('status' => 1, 'msg' => 'Post created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return array('status' => 0, 'msg' => 'Post creation is Unsuccessfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            
            $post = Post::find($id);
            $post->delete();
            $post_data = $post->first();
            
            $main_img_path = $post_data->main_image;
            $img_one_path = $post_data->image_1;
            $img_two_path = $post_data->image_2;
            $img_three_path = $post_data->image_3;
            $img_four_path = $post_data->image_4;
            $img_path_five = $post_data->image_5;
            
            Storage::delete($main_img_path);
            Storage::delete($img_one_path);
            Storage::delete($img_two_path);
            Storage::delete($img_three_path);
            Storage::delete($img_four_path);
            Storage::delete($img_path_five);

            return array('status' => 'Post Deleted Successfully!');
        } catch (Exception $e) {
            return array('status' => 'Post Deleting is Unsuccessfull!');
        }
    }

}
