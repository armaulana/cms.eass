<?php

class ModelProductFilter extends CI_Model {
 
    function fetch_filter_type($type){
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('product');
        $this->db->where('product_status', '1');
        return $this->db->get();
    }

    function autocomplete($title){
        $this->db->like('judul', $title);
        $this->db->limit(10);
        return $this->db->get('bucket_book_about')->result();
    }

    function category(){
        $this->db->where('is_trash', 1);
        return $this->db->get('bucket_book_category');
    }

    function publisher(){
        $this->db->where('is_trash', 1);
        return $this->db->get('bucket_book_publisher');
    }

    function make_query($minimum_price, $maximum_price, $category, $pengarang, $publisher){
        
        $query = "
                    SELECT 
                    a.id,a.judul, a.deskripsi, a.harga, b.nama as kategori, c.nama as pengarang, d.nama as publisher 
                    FROM bucket_book_about a  
                    LEFT JOIN bucket_book_category b ON a.id_kategori = b.id
                    LEFT JOIN bucket_book_pengarang c ON a.id_pengarang = c.id
                    LEFT JOIN bucket_book_publisher d ON a.id_publisher = d.id
                    WHERE a.is_trash = 1          
        ";

        if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price)){
            $query .= "
                AND a.harga BETWEEN '".$minimum_price."' AND '".$maximum_price."'
            ";
        }

        if(isset($category)){
            $category_filter = implode("','", $category);
            $query .= "
                AND a.id_kategori IN('".$category_filter."')
            ";
        }

        if(isset($publisher)){
            $publisher_filter = implode("','", $publisher);
            $query .= "
                AND a.id_publisher IN('".$publisher_filter."')
            ";
        }

        return $query;
    }

    function count_all($minimum_price, $maximum_price, $category, $pengarang, $publisher){
        $query = $this->make_query($minimum_price, $maximum_price, $category, $pengarang, $publisher);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    function fetch_data($limit, $start, $minimum_price, $maximum_price, $category, $pengarang, $publisher){
        $query = $this->make_query($minimum_price, $maximum_price, $category, $pengarang, $publisher);

        $query .= ' LIMIT '.$start.', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if($data->num_rows() > 0) {
                foreach($data->result_array() as $row){
                    $output .= '
                    <div class="col-sm-5 col-lg-4 col-md-4">
                        <div style="border-radius:5px; margin-bottom:16px; ">
                            <div class="card-img">
                                <img src="'.base_url().'uploads/images/sample.jpg" alt="" class="img-responsive image" style="padding-bottom: 8px;">
                                <div class="middle">
                                      <b>Review</b> <br/>
                                      <button type="button" class="btn btn-primary" style="margin: 6px">Google Book</button>
                                      <button type="button" class="btn btn-primary" style="margin: 6px">Goodreads</button>
                                </div>
                            </div>
                            <p style="margin-bottom: 0px"><strong><a href="'.base_url().'detail/'.$row['id'].'">'. $row['judul'] .'</a></strong></p>
                            <small style="color: #6c757d9c">'. $row['pengarang'] .'</small>
                            <p><b>Rp. 30.000,-</b></p>
                        </div>
                    </div>
                    ';
                }
        }else{
            $output = '<h3>No Data Found</h3>';
        }
        return $output;
    }
}

?>
