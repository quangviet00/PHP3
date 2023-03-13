<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use App\Models\Position;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();
        $systemUsers = [
            [
                'id' => 1,
               'ten' => 'admin',
               'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'quyen' => 0,
            ],
            [
                'id' => 2,
                'ten' => 'khách',
                'email' => 'khach@gmail.com',
                 'password' => Hash::make('12345678'),
                 'quyen' => 1,
            ]
        ];
        User::factory($systemUsers)->create();

        DB::table('news')->truncate();
        for ($i = 1; $i < 10; $i++) {
            $dataSeeders = [
                [
                    'id' => $i,
                    'tieude' => 'Tiêu đề' . $i,
                    'noidung' => 'Xây dựng một hệ thống quản lý tin tức cơ bản, cho phép những thành viên đăng ký có thể thêm/sửa/xóa bài viết của họ, và có thể xem các bài viết khác.
                    Quản trị viên sẽ xác nhận xuất bản các bài viết, mặc định các bài viết sẽ là bản nháp chờ duyệt
                    yêu cầu gửi lại link git để chế độ public',
                    'anh' => '1',
                    'trangthai' => rand(0, 1),
                ],
            ];
            DB::table('news')->insert($dataSeeders);
        }
    }
}
