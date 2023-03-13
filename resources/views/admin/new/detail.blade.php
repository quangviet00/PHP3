@extends('admin.master')
@section('title', ' Chi Tiết Bài Viết')
@section('content-title','Chi Tiết Bài Viết')
@section('content')
{{-- news details? --}}
<div
class="post-loop-grid post-30 post type-post status-publish format-standard has-post-thumbnail hentry category-news tag-beauty tag-nature tag-travel-tips">
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <div class="entry-content">
                   <h4>{{ $new->tieude }}</h4>
                   <img src="{{asset($new->anh)}}" width="924" height="556"   sizes="(max-width: 1024px) 100vw, 1024px">
               <br>
                <p>{{ $new->noidung }}</p>
             
            </div>
           
        </div>
    </div>
</div>
</div>


@endsection
