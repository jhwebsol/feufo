<?php include("includes/css.php");?> 
<style type="">
  label{color: #858796;font-size: 17px;font-weight: 400;}
.form-control{border-radius:8px;height:40px;}
.box-header h6{font-size: 18px!important;}
.box-header .table tr th{  color: #858796;
  font-size: 16px;
}
.box-body .table tr th, .box-body .table tr td{color: #858796!important;font-size:17px!important;}
 .basicinform{color: #858796;font-size: 26px;font-weight: 500;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <a href="agent_properties.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Property</a>
      </section>
      <!-- Main content -->
      <section class="content">
     <div class="box box-danger gurnew">       
                  <div class="box-body"> 
                        <h4 class="basicinform">Basic Information</h4>
                        <hr>
                        <div class="form-group">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" class="form-control" id="slug" value="">
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Property Types <span class="text-danger">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-property_type" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="select2-data-2-5zhf">Select Property Type</option>
                                                                                <option value="1">House</option>
                                                                                <option value="3">Resort</option>
                                                                                <option value="4">Business</option>
                                                                                <option value="5">Restaurant</option> 
                                                                                <option value="8">Education</option>
                                                                                <option value="9">Housing</option>
                                                                            </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City <span class="text-danger">*</span></label>
                                    <select name="city" id="city" class="form-control select2 select2-hidden-accessible" data-select2-id="select2-data-city" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="select2-data-4-wqgo">Select City</option>
                                                                                <option value="1">England, England, United Kindom</option>
                                                                                <option value="2">Tezpur, Queensland, Australia</option>
                                                                                <option value="4">Los Angeles, California, United State</option>
                                                                                <option value="5">California City, California, United State</option>
                                                                                <option value="6">Oaklan, California, United State</option>
                                                                                <option value="7">Miami, Florida, United State</option>
                                                                                <option value="8">Tampa, Florida, United State</option>
                                                                                <option value="9">Florida City, Florida, United State</option>
                                                                            </select> 
</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="purpose">Purpose <span class="text-danger">*</span></label>
                                    <select name="purpose" id="purpose" class="form-control">
                                                                                <option value="1">For Sale</option>
                                                                                <option value="2">For Rent</option>
                                                                            </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" name="price" class="form-control" value="">
                                </div>
                            </div>

                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                    <label for="period">Period <span class="text-danger">*</span></label>
                                    <select name="period" id="period" class="form-control">
                                        <option value="Daily">Daily</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>  
        </div>  
         <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Others Information</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Area(Square Feet) <span class="text-danger">*</span></label>
                                    <input type="text" name="area" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Unit <span class="text-danger">*</span></label>
                                    <input type="number" name="unit" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Room <span class="text-danger">*</span></label>
                                    <input type="number" name="room" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bedroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bedroom" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Bathroom <span class="text-danger">*</span></label>
                                    <input type="number" name="bathroom" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Floor <span class="text-danger">*</span></label>
                                    <input type="number" name="floor" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Kitchen </label>
                                    <input type="number" name="kitchen" value="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Parking Place</label>
                                    <input type="number" name="parking" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                         <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Image, PDF and Video</h4>
                        <hr>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">PDF File</label>
                                    <input type="file" name="pdf_file" class="form-control-file">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" name="banner_image" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Thumbnail Image <span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail_image" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Slider Images (Multiple) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" name="slider_images[]" multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Youtube Video Link</label>
                                    <input type="text" class="form-control" name="video_link" value="">
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                     <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Aminities</h4>
                        <hr> 
                                <div class="form-group">
                                    <div>
                                                                                                                                    <input value="1" type="checkbox" name="aminities[]" id="good-for-kids">
                                                <label class="mx-1" for="good-for-kids">Good for kids</label>
                                                                                                                                                                                <input value="2" type="checkbox" name="aminities[]" id="elevator-in-building">
                                                <label class="mx-1" for="elevator-in-building">Elevator in building</label>
                                                                                                                                                                                <input value="3" type="checkbox" name="aminities[]" id="bike-parking">
                                                <label class="mx-1" for="bike-parking">Bike Parking</label>
                                                                                                                                                                                <input value="4" type="checkbox" name="aminities[]" id="alcohol">
                                                <label class="mx-1" for="alcohol">Alcohol</label>
                                                                                                                                                                                <input value="5" type="checkbox" name="aminities[]" id="reservations">
                                                <label class="mx-1" for="reservations">Reservations</label>
                                                                                                                                                                                <input value="6" type="checkbox" name="aminities[]" id="free-coffee-and-tea">
                                                <label class="mx-1" for="free-coffee-and-tea">Free coffee and tea</label>
                                                                                                                                                                                <input value="7" type="checkbox" name="aminities[]" id="accepts-credit-cards">
                                                <label class="mx-1" for="accepts-credit-cards">Accepts Credit Cards</label>
                                                                                                                                                                                <input value="14" type="checkbox" name="aminities[]" id="air-condition">
                                                <label class="mx-1" for="air-condition">Air Condition</label>
                                                                                                                                                                                <input value="15" type="checkbox" name="aminities[]" id="cable-tv">
                                                <label class="mx-1" for="cable-tv">Cable Tv</label>
                                                                                                                                                                                <input value="16" type="checkbox" name="aminities[]" id="balcony">
                                                <label class="mx-1" for="balcony">Balcony</label>
                                            </div>

                                </div> 
                        </div> 
        </div> 
  <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Nearest Locations</h4>
                        <hr>
                       <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nearest Locations</label>
                                            <select name="nearest_locations[]" id="" class="form-control">
                                                <option value="">Select Nearest Location</option>
                                                                                                <option value="1">Rail Station</option>
                                                                                                <option value="2">Bus Station</option>
                                                                                                <option value="3">Airport</option>
                                                                                                <option value="4">Beach</option>
                                                                                                <option value="5">Metro</option>
                                                                                                <option value="6">Bank</option>
                                                                                                <option value="7">School</option>
                                                                                                <option value="8">Hospital</option>
                                                                                                <option value="10">Super Market</option>
                                                                                                <option value="11">Pharmacy</option>
                                                                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Distance(km)</label>
                                            <input type="text" class="form-control" name="distances[]">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="addNearestPlaceRow" type="button" class="btn btn-success btn-sm nearest-row-btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="box box-danger gurnew">     
         <div class="box-body"> 
                        <h4 class="basicinform">Property Details and Google Map</h4>
                        <hr>  
                                <div class="form-group">
                                    <label>Google Map Code</label>
                                    <textarea class="form-control" rows="5" name=""></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea class="summernote" id="summernote" name="description" style="visibility: hidden; display: none;"></textarea> 
                            </div>
                        </div> 
                                </div> 

                                      <div class="box box-danger gurnew">     
         <div class="box-body">       
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="featured">Featured <span class="text-danger">*</span></label>
                                    <select name="featured" id="featured" class="form-control">
                                        <option selected="" value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="top_property">Top Property <span class="text-danger">*</span></label>
                                    <select name="top_property" id="top_property" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="urgent_property">Urgent Property <span class="text-danger">*</span></label>
                                    <select name="urgent_property" id="urgent_property" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                                </div>
                                <button class="btn btn-success btn-lg">Save</button>
                                 
          </section> 
    </div>
    
    <?php include("includes/footer.php");?>
    <div class="control-sidebar-bg"></div>
  </div>
  <?php include("includes/js.php");?>
</body>
</html>