<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 8:58 AM
 */
namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\Category;
use App\Model\News;
use Illuminate\Http\Request;

class EditController extends Controller{
    private $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }
    public function index($id){
        $cat= Category::where('parent_id',21)->get();
        $n = News::where('id',$id)->first();
        return view('backend.page.news.edit',['data'=>$n,'cat'=>$cat]);
    }
}