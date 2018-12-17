<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 23/07/2018
 * Time: 9:13 PM
 */
namespace App;
use App\Model\Banners;
use App\Model\Category;
use App\Model\Products;
use Dotenv\Validator;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Helper{
    public static function getUrl($route){
        if(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])){
            return ($_SERVER["HTTP_X_FORWARDED_PROTO"]=="https") ? secure_url($route) :url($route);

        }else return url($route);
    }
    public static function getDateTime($timestamp)
    {
        date_default_timezone_set('Asia/Bangkok');
        return date("Y-m-d", $timestamp);
    }
    public static function uploadPhoto(Request $request,$move)
    {
        $file = $request->file($move);

        $name = $file->getClientOriginalName();
        $hinh = str_random(5)."-".$name;
        while(file_exists("uploads/".$move." /".$hinh))
        {
            $hinh = str_random(5)."-".$name;
        }
        $file->move("uploads/".$move."/",$hinh);

        return $hinh;
    }
    public static function optionSelect2($values, $selected)
    {
        if (!is_array($values) && !is_object($values)) {
            $values = (array)json_decode($values);
        }
        foreach ($values as $key => $value) {
            if ($key == $selected) {
                $flag = "selected";
            } else {
                $flag = "";
            }
            echo "<option $flag value=\"" . $key . "\">$value</option>";
        }

    }
    public static function getTitle($url){
        $str = file_get_contents($url);
        if(strlen($str)>0){
            $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
            preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
            return $title[1];
        }
        echo self::getTitle("/");
    }
    public static function MenuMulti($data,$parent_id ,$str='---| ',$select){
        foreach ($data as $val) {
            $id = $val["id"];
            $ten= $val["name"];
            if ($val['parent_id'] == $parent_id) {
                // print_r($select);  exit();
                if ($select!=0 && $id == $select) {
                    echo '<option value="'.$id.'" selected >'.$str." ".$ten.'</option>';
                }	else {
                    echo '<option value="'.$id.'">'.$str." ".$ten.'</option>';
                }
                self::MenuMulti($data,$id,$str.'---|',$select);
            }
        }
    }
    public static function listCate($data,$parent_id =0,$str=""){
        foreach ($data as $val) {
            $id = $val["id"];
            $ten= $val["name"];
            if ($val['parent_id'] == $parent_id) {
                echo '<tr>';
                if ($str =="") {
                    echo '<td ><strong>'.$id.'</strong></td>';
                    echo '<td ><strong style="color:blue;">'.$str.'- '.$ten.'</strong></td>';
                } else {
                    echo '<td ><strong>'.$id.'</strong></td>';
                    echo '<td style="color:green;">'.$str.'--|'.$ten.'</td>';
                }
                echo '<td class="list_td aligncenter">
		            <a href="../admin/danhmuc/sua/'.$id.'" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
		            <a href="../admin/danhmuc/del/'.$id.'" title="Xóa" onclick="return xacnhan(\'Xóa danh mục này ?\') "> <span class="glyphicon glyphicon-remove"></span> </a>
			      </td>    
			    </tr>';
                self::listcate ($data,$id,$str." ---| ");
            }
        }
    }
    public static function showListBanner(){
        $list = Banners::where('status','su_dung')->get();
        return $list;
    }
    public static function getPost(){
        $cat = Category::where('parent_id',21)->get();
        return $cat;
    }
    public static function getSale(Products $pro){
        if($pro->unit_price == 0) return 0;
        if($pro->promotion_price == 0) return 0;
        return 100*($pro->unit_price - $pro->promotion_price)/($pro->unit_price);
    }

    public static function getCurrentDate()
    {
        date_default_timezone_set('Asia/Bangkok');
        return date("Y-m-d");
    }
    public static function getSubDate($date,$number){
        date_default_timezone_set('Asia/Bangkok');
        $date = date_create($date);
        date_sub($date, date_interval_create_from_date_string($number . ' days'));
        return date_format($date, 'Y-m-d');
    }

    public static function getProductList($cat)
    {
        $now =self::getCurrentDate();
        switch ($cat) {
            case 'san-pham-moi':
                return Products::where('created_at', '<', Helper::getSubDate($now, 5))->get();
            case 'san-pham-noi-bat':
                return Products::where('status',2)->paginate(5);
            default:
                $id = Category::select('id')->where('slug',$cat)->first();
                return Products::where('cat_id',$id)->get();
//                return $list_product;
            }
        }

}
