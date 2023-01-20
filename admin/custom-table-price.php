<style type="text/css">
  .prd-block .size-list li span.value {
  font-size: 14px;
  font-weight: 500;
  line-height: 33px;
  display: inline-block;
  min-width: 33px;
  height: 70px;
  padding: 0 5px;
  text-align: center;
  color: #282828;
  border-radius: 4px;
  background-color: #fff;
  border: 0px solid #333;
  width: 100%;
}
.prd-block .size-list li a {
  display: block;
  width: 100%;
  text-decoration: none;
  border: 1px solid #f5f5f5;
background: #f5f5f5;
}
.prd-block .size-list li button {
  display: block;
  width: 100%;
  text-decoration: none;
  border: 1px solid #000; 
background: #transparent;
}
.prd-block_options:not(.prd-block_options--select) {
  margin-top: 85px;
}
.prd-block .size-list li {
  position: relative;
  display: -ms-inline-flexbox;
  display: inline-flex;
  margin: 5px 7px 0 0;
  vertical-align: bottom;
  -ms-flex-pack: center;
  justify-content: center;
}
.prd-block .size-list li span.value .Small1 {
  width: 50%;
  padding: 0px;
  float: left;
  text-align: left;
  font-weight: 600;
}
.prd-block .size-list li span.value .Small2 {
  width: 50%;
  padding: 0px;
  float: left;
  text-align: right;
}
.prd-block .size-list li:hover:not(.absent-option) span.value {
  color: #000;
   border: 1px solid #00fdfd;
  background: #00fdfd;
}
.prd-block .size-list li span.active {
  color: #000;
   border: 1px solid #00fdfd;
  background: #00fdfd;
}  
</style>
    <div class="prd-block prd-block_options">
        <div class="prd-size">
            <h2 class="mb-0"> &nbsp; Select Your Options</h2>
            <ul class="size-list js-size-list ulCategory" id="ulCategory" data-select-id="SingleOptionSelector-1">
            <?php $sqlh="SELECT height_weight.*,product_size.size as sizes from height_weight join product_size on height_weight.size_id=product_size.id ";
                $resultht=mysqli_query($conn,$sqlh); $j=1;
                while ($ressz=mysqli_fetch_array($resultht)){ 
                if($countrys === IN){ ?> 
                 <li class="col-md-8" id="<?= $ressz['id']; ?>"><button ><span class="value psize li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['base_price_inr'];?>" data-values="<?= $ressz['india'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">
                    <div class="Small1"> <?= $ressz['sizes'];?><br>₹ <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['base_price_inr'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li>
                <?php }elseif ($countrys=== GB) { ?>
                <li class="col-md-8"><button data-value="Small"><span class="value li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['bprice_uk'];?>" data-values="<?= $ressz['united_kindom'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">
                    <div class="Small1"> <?= $ressz['sizes'];?><br>£ <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['bprice_uk'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li><?php }elseif ($countrys=== AU) { ?>
                <li class="col-md-8"><button data-value="Small"><span class="value li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['bprice_aud'];?>" data-values="<?= $ressz['australia'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">              <div class="Small1"> <?= $ressz['sizes'];?><br>$ <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['bprice_aud'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li><?php }elseif ($countrys=== AE) { ?>
                <li class="col-md-8"><button data-value="Small"><span class="value li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['bprice_aed'];?>" data-values="<?= $ressz['united_arab_emirates'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">     <div class="Small1"> <?= $ressz['sizes'];?><br>د.إ  <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['bprice_aed'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li><?php }elseif ($countrys=== EU)  { ?>
                <li class="col-md-8"><button data-value="Small"><span class="value li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['bprice_euros'];?>" data-values="<?= $ressz['european_union'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">              <div class="Small1"> <?= $ressz['sizes'];?><br>€ <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['bprice_euros'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li><?php }elseif ($countrys=== US){ ?>
                <li class="col-md-8"><button data-value="Small"><span class="value li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['bprice_ued'];?>" data-values="<?= $ressz['usa'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">              <div class="Small1"> <?= $ressz['sizes'];?><br>$ <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['bprice_ued'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li><?php }elseif ($countrys=== NZ){ ?>
                <li class="col-md-8"><button data-value="Small"><span class="value li<?= $ressz['id']?> <?php if($j==1){ echo "active"; }else{ echo "inactive"; } ?>" data-options="<?= $ressz['bprice_nzd'];?>" data-values="<?= $ressz['nzd'];?>" value="<?= $ressz['id']; ?>" id-type="<?= $ressz['id']; ?>">
                    <div class="Small1"> <?= $ressz['sizes'];?><br>$ <span class="fprice fprices<?= $ressz['id']?>" id="fprice"><?= $ressz['bprice_nzd'];?></span></div>
                    <div class="Small2">HEIGHT <br><?= $ressz['size'];?></div>
                </span></button></li> <?php } ?>
                <?php $j++; } ?>
            </ul>
        </div>
    </div>
