   
<div class="col-md-4 pl-4">
    <h5 class="font-weight-bold spanborder"><span>Popular</span></h5>
	<ol class="list-featured">
	<?php foreach($berita_popular as $key){ ?>
		<li>
			<span>
				<h6 class="font-weight-bold">
					<a href="<?php echo base_url(); ?>blog/<?php echo $key->slug; ?>" class="text-dark"><?php echo $key->judul; ?></a>
				</h6>
				<p class="text-muted">
					<?php $nama = $this->db->where('id', $key->insert_by)->get('users')->row(); ?>
					<?php echo $nama->username; ?>
				</p>
			</span>
		</li>
	<?php } ?>
	</ol>
</div>