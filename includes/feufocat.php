<style type="text/css">
 .pricing-table .each-table .table-single {
  position: relative;
  padding: 40px 30px;
  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  -ms-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.table-single:hover{border:1px solid #fff;}
.pricing-table .each-table .table-single .section-heading {
  margin-bottom: 15px;
}  
.pricing-table .each-table .table-single .nav {
  padding-left: 0px;
  margin-top: 40px;
}
.pricing-table .each-table .table-single .nav li {
  margin-bottom: 10px;
  border-bottom: 1px solid;
  padding-bottom: 10px;
}
.pricing-table .each-table .table-single .nav li:last-child {
  border-bottom: 0px solid;
  padding-bottom: 0px;
}
.pricing-table .each-table .table-single .btn-form {
  margin-top: 50px;
}
.pricing-table.pricing-table-js .each-table .left {
  z-index: 2;
  left: -65px;
}
.pricing-table.pricing-table-js .each-table .right {
  z-index: 2;
  right: -65px;
}
.pricing-table.pricing-table-js .each-table .table-single {
  transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(0.9);
  -o-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(0.9);
  -ms-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(0.9);
  -moz-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(0.9);
  -webkit-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(0.9);
  z-index: 1;
}
.pricing-table.pricing-table-js .each-table .table-single.active {
  z-index: 4;
  transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(1);
  -o-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(1);
  -ms-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(1);
  -moz-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(1);
  -webkit-transform: translateX(0) translateY(0) translateZ(0) rotate(0deg) scale(1);
        box-shadow: 0 21px 65px 0 rgba(0, 0, 0, 0.12);
    -moz-box-shadow: 0 21px 65px 0 rgba(0, 0, 0, 0.12);
    -webkit-box-shadow: 0 21px 65px 0 rgba(0, 0, 0, 0.12);
    -o-box-shadow: 0 21px 65px 0 rgba(0, 0, 0, 0.12);
}
.table-single {
  background: #5C54FF;
  color: #fff;
}


@media (min-width:320px) and (max-width:640px){
.pricing-table.pricing-table-js .each-table .right {
  z-index: 2;
  right: 0px;
}
.pricing-table.pricing-table-js .each-table .left {
  z-index: 2;
  left: 0px;
}
}
</style>


<section class="features-section-6 section" style="background:rgb(96,40,89);background:linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
            <div class="container">
                <div class="row section-separator"> 
                    <div class="section-header col-md-8">  </div> 
                    <div class="pricing-table pricing-table-js col-xs-12">
                        <div class="row"> 
                            <?php $sql_sr=mysqli_query($conn,"select * from service_details");
                             while($resr= mysqli_fetch_array($sql_sr)){ ?>                          
                            <div class="each-table col-sm-4 col-xs-12">
                                <div class="table-single right text-center">
                                <img src="admin/img/<?php echo $resr['service_img']; ?>" alt="" style="height: 80px">
                                    <h3 class="section-heading"><?php echo $resr['title']; ?></h3> 
                                    <ul class="nav" style="color:#ffffff">
                                        <li style="color:#fff"><?php echo html_entity_decode($resr['description']); ?></li>
                                    </ul>
                                    <div class="btn-form">
                                        <a href="#" class="btn btn-warning">View More</a>
                                    </div>
                                </div> 
                            </div> <?php } ?> 
                            
                        </div> 
                    </div> 

                </div> 
            </div> 
        </section>
 