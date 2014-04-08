<?php
class ControllerModuleFeaturedwb extends Controller {
	protected function index($setting) {
		$this->language->load('module/featuredwb');
 

		$this->data['button_cart'] = $this->language->get('button_cart');
		
		$this->load->model('catalog/product');
		
		$this->load->model('tool/image');

		$this->data['products'] = array();

		if (isset($results)) {
		foreach ($results as $result) {
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'], $setting['image_width'], $setting['image_height']);
			} else {
				$image = false;
			}
			
			if ($this->config->get('config_review_status')) {
				$rating = $result['rating'];
			} else {
				$rating = false;
			}
							
			$this->data['products'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'name'    	 => $result['name'],
				'rating'     => $rating,
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}

		if ((file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/featuredwb.tpl'))and (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/featuredwb_middle.tpl')))     {
			$this->template = $this->config->get('config_template') . '/template/module/featuredwb.tpl';
		} else {
			$this->template = 'default/template/module/featuredwb.tpl';
		}

		$this->render();
	}
}
?>