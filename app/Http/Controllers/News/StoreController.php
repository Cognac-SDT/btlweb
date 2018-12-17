<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:10 AM
 */

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;

use App\Http\Requests\AddNewsRequest;
use App\Model\News;
use Illuminate\Http\Request;
use DateTime, Illuminate\Http\File, Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function __construct()
    {
    }

    public function index(AddNewsRequest $rq)
    {
        $n = new News();
        $n->title = $rq->txtTitle;
        $n->slug = str_slug($rq->txtTitle,'-');
        $n->author = $rq->txtAuth;
        $n->tag = $rq->txttag;
        $n->status = $rq->slstatus;
        $n->source = $rq->txtSource;
        $n->intro = $rq->txtIntro;
        $n->full = $rq->txtFull;
        $n->cat_id = $rq->sltCate;
//        $n->user_id = Auth::guard('admin')->user()->id;
        $n->created_at = new datetime;

        $f = $rq->file('txtimg')->getClientOriginalName();
        $filename = time().'_'.$f;
        $n->images = $filename;
        $rq->file('txtimg')->move('uploads/news/',$filename);

        $n->save();
        return redirect()->route('news.index')->with('status', 'Thêm bài viết thành công');
    }
}