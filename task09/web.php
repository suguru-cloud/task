<?php
/*
「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerの
 bbbというAction に渡すRoutingの設定」を書いてみてください。
 *\
 
Route get::('XXX', 'AAAController@bbb');

/*
前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加
しました。web.phpを編集して、admin/profile/create にアクセスしたら
ProfileController の add Action に、admin/profile/edit にアクセスしたら
ProfileController の edit Action に割り当てるように設定
*\

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //以下を追記
  public function add()
  {
    return view('admin.profile.create');
  }
  
  public function create()
  {
    return redirect('admin/profile/create');
  }
  
  public function edit()
  {
    return view('admin.profile.edit');
  }
  
  public function update()
  {
    return redirect('admin/profile/edit');
  }
}

Route::group(['prefix' => 'admin'], function() {
  Route::get('profile/create', Admin\ProfileController@aff);
  Route::get('profile/edit', Admin\ProfileController@edit);
});