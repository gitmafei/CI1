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
        $this->load->helper("captcha_helper");//������֤��
        $vals = array(
              'img_path'     => './captcha/',        //��֤��ͼƬ���ŵĵ�ַ
              'img_url'  => base_url()."/captcha/",  //ͼƬ���ʵ�·��
              'img_width'    => '60',                //ͼƬ�Ŀ���
              'img_height' => 20,                    //�߶�
              'expiration' => 1,                     //����ʱ��,1����
              'word_length'=> 4                      //��ʾ��λ��֤����
        );
        $cap = create_captcha($vals);
        $out_datas["v_img"]=$cap["image"];                //���ɵ�ͼƬ�ļ�
        $out_datas["v_word"]=$cap["word"];                //���ɵ���֤��,Ҳ�ɷ���session�й���
        return $out_datas;
    }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
