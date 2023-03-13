<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public News $new;
    public User $user;
    public function __construct(News $new ,User $user)
    {
        $this->new = $new;
        $this->user = $user;
     
        
    }
    function index()
    {

        // $new = News::get();
        $new = $this->new->
        // join('users', 'users.id', '=', 'news.user_id')->
        where('user_id', optional(Auth::user())->id)->with('getUser')->get();
        // dd($new->toArray());
        return view('admin.new.list', [
            'new_list' => $new,
            // 'checknew' => $checknew,
            'title' => 'Chi Tiết Bài Viết'
        ]);
    }
    function quanlydangtin()
    {

        $new = News::get();
        return view('admin.new.quanlydangtin', [
            'new_list' => $new,
            'title' => 'Quanr lý đăng tin'
        ]);
    }
    function detail(News $id)
    {

        $new = News::find($id->id);
    
        
        return view('admin.new.detail', [
            'new' => $id,
        ]);
    }
    function create()
    {
        return view('admin.new.add');
    }
    public function store(Request $request)
    {
        $news = new News;
    //     $user = $this->user->join('news', 'news.user_id', '=', 'users.id')
    //    ->where('user_id', optional(Auth::user())->id)->first()
    //     ->get();
        // dd($user->toArray());
        $news->fill($request->all()); // đặt name ở form cùng giá trị với thuộc tính
        // 3. Xử lý file avatar gửi lên

        if ($request->hasFile('anh')) {
         
            $anh = $request->anh;
            $avatarName = $anh->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $news->anh = $anh->storeAs('images', $avatarName);
            $news->tieude = $request->tieude;
            $news->user_id =  Auth::user()->id;
            $news->noidung = $request->noidung;
            $news->trangthai = 1;
        //  dd($news);
            $news->save();

            return redirect()->route('admin.new');
        }
    }
    public function edit(Request $request)
    {
     $new =$this->new->where('id', $request->id)->first();
     
        return view('admin.new.edit',[ 'new' =>$new]);
    }
    public function update(Request $request, News $new )
    {
        $new->fill($request->all());
        if ($request->hasFile('anh')) {
            $anh = $request->anh;
            $avatarName = $anh->hashName();
            $avatarName = $request->name . '_' . $avatarName;
            $new->anh = $anh->storeAs('images', $avatarName);
        }
        $new->tieude = $request->tieude;
        $new->noidung = $request->noidung;
        $new->trangthai = 1;
        
        $new->save();
        
        return redirect()->route('admin.new');
    }
    public function delete(Request $request)
    {
        News::destroy($request->id);
        return redirect()->back();
    }
    public function status(News $new)
    {
    //    dd($new);
        if ($new->trangthai == 0) {
            $new->trangthai = 1;
        } else {
            $new->trangthai =  0;
        } 
        
        $new->save();
        return back();
    }
}
