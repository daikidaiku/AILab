<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
class ChatGptController extends Controller
{
    public function index()
    {


        // return view('index',['data'=>$data]);
    }

    public function first(Request $request){
        $first_keywords=["勉強","ビジネス","料理","運動","ゲーム","旅行","ファッション","芸術"];
        
    
        return view('first',['first_keywords'=>$first_keywords]);
    }
    
    public function get_first_keyword(Request $request){
        $selected_keyword = $request->input('keyword');
        // dd($selected_keyword);
        return redirect()->route('second', ['selected_first_keyword'=>$selected_keyword]);
    }
    
    public function second($selected_first_keyword){
        if($selected_first_keyword=="勉強"){
            $second_keywords=["アカデミック","スキル獲得","職業","教育レベル","学習方法","好きなキーワード"];
        }
        else{
            $second_keywords=["ほかーいち","ほかーに","ほかーさん"];
        }
        
        return view('second',['selected_first_keyword'=>$selected_first_keyword,"second_keywords"=>$second_keywords]);
    }
    
    public function get_second_keyword(Request $request) {
        $selected_first_keyword = $request->input('first_keyword');
        $selected_second_keyword = $request->input('second_keyword');
        
        return redirect()->route('third', [
            'selected_first_keyword' => $selected_first_keyword,
            'selected_second_keyword' => $selected_second_keyword
            ]);
        
    }
    
    public function third($selected_first_keyword,$selected_second_keyword){
        if($selected_second_keyword=="アカデミック"){
            $third_keywords=["授業","レポート", "研究・ゼミ","日常生活", "フィールドワーク","好きなキーワード"];
        }
        else{
            $third_keywords=["ほかーほかーいち","ほかーほかーに"];
        }
        
        return view('third',['selected_first_keyword'=>$selected_first_keyword,'selected_second_keyword'=>$selected_second_keyword,"third_keywords"=>$third_keywords]);
    }
    
    public function get_third_keyword(Request $request) {
        $selected_first_keyword = $request->input('first_keyword');
        $selected_second_keyword = $request->input('second_keyword');
        $selected_third_keyword = $request->input('third_keyword');
        
        return redirect()->route('fourth', [
            'selected_first_keyword' => $selected_first_keyword,
            'selected_second_keyword' => $selected_second_keyword,
            'selected_third_keyword' => $selected_third_keyword,
            ]);
    }
    
    public function fourth($selected_first_keyword,$selected_second_keyword,$selected_third_keyword){
        return view("fourth",['selected_first_keyword'=>$selected_first_keyword,'selected_second_keyword'=>$selected_second_keyword,"selected_third_keyword"=>$selected_third_keyword]);
    }

    public function get_last_keyword(Request $request){
        $selected_first_keyword = $request->input('first_keyword');
        $selected_second_keyword = $request->input('second_keyword');
        $selected_third_keyword = $request->input('third_keyword');
        $last_keyword = $request->input('last_keyword');
        
        return redirect()->route('finish', [
            'selected_first_keyword' => $selected_first_keyword,
            'selected_second_keyword' => $selected_second_keyword,
            'selected_third_keyword' => $selected_third_keyword,
            'last_keyword'=>$last_keyword,
            ]);
        
        
    }
    
    public function finish($selected_first_keyword,$selected_second_keyword,$selected_third_keyword,$last_keyword){
        
        $theme_1 = $selected_first_keyword;
        $theme_2 = $selected_second_keyword;
        $theme_3 = $selected_third_keyword;
        $purpose = $last_keyword;

        $txt = $theme_1.'、'.$theme_2.'、' .$theme_3.'に対して、';
        if ($purpose != ''){
            $purpose = $purpose.'という';
        }
        
        $question = $txt.$purpose.'疑問・要望を叶えるアイディアを5つ、フォーマットを"[{title,description}]"で、JSON形式で出力せよ。';

        $msg = [
                ['role' => 'system', 'content' => '日本語での回答'],
                ['role' => 'user', 'content' => $question],
            ];
        $result = OpenAI::chat()->create([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => $msg,
                ]);
        $json = $result->choices[0]->message->content . PHP_EOL;

        $arr = json_decode($json,TRUE);
        $data = $arr;
        // return view("finish",['selected_first_keyword'=>$selected_first_keyword,'selected_second_keyword'=>$selected_second_keyword,"selected_third_keyword"=>$selected_third_keyword]);
        return view('index',['data'=>$data]);
    }
}


