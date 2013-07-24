<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 public function index()
    {
        $out_datas=$this->_captcha();
        $this->load->view('welcome_message',$out_datas);
    }
    private function _captcha(){
        $this->load->helper("my_captcha");//加载验证码
        $vals = array(
              'img_path'     => './captcha/',        //验证码图片存放的地址
              'img_url'  => base_url()."/captcha/",  //图片访问的路径
              'img_width'    => '60',                //图片的宽度
              'img_height' => 20,                    //高度
              'expiration' => 1,                     //存放时间,1分钟
              'word_length'=> 4                      //显示几位验证数字
        );
        $cap = create_captcha($vals);
        $out_datas["v_img"]=$cap["image"];                //生成的图片文件
        $out_datas["v_word"]=$cap["word"];                //生成的验证码,也可放入session中管理
        return $out_datas;
    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */