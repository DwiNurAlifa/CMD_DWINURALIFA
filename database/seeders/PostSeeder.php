<?php

namespace Database\Seeders;
use App\Models\post;
use Illuminate\support\str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'vas bungan',
        ];
        foreach ($judul as $j){
            $slug = str::slug($j);
            $slugOri = $slug;
            $count =1;
            while(post::where('slug',$slug)->exists()){
                $slug = $slugOri."-".$count;
                $count++;
            }
             post::create([
                'title' => $j,
                'slug' => $slug,
                'description'=>'deskripsi untuk ' . $j,
                'content'=>'konten untuk '.$j,
                'status'=>'publish',
                'user_id'=>'1'
            ]);
        }
    }
}
