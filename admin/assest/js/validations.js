function validatetext(value,alertarea)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
  }

    function validatetextfocus(value,alertarea,focus)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {     $("#"+focus).focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
  }

  function validatenumber(value,alertarea)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();          
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(isNaN(contentid.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }

    function validatenumberspl(value,alertarea)// function to validate for text box
  {
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();          
            $("#"+alertarea).html("Required field");

            return 0; 
         }
         else if(isNaN(contentid.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            document.getElementById(value).value = "";
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }
function validate_fileupload(fileName,alertarea)
{ 
   
    var contentid = document.getElementById(fileName);
    var forext = contentid.value;
      var ext = forext.substring(forext.lastIndexOf('.') + 1);

        if(contentid.value == "" || contentid.value == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
        else 
          {
            $("#"+alertarea).html("");
            if(ext == "jpg" || ext == "png" || ext == "gif" || ext == "JPG" || ext == "PNG" || ext == "GIF")
        {
            return true; // valid file extension
        }  
        else
        {       
            $("#"+alertarea).html("Please Upload jpg, png   files only");
            return false;
        }
          }
}

  function validdob(date,alert)// function to validate dateofbirth in student registration
  {    
       var a_p_date  = $("#"+date);
        
         if(a_p_date.val()=="" || a_p_date.val()==null)
         {    a_p_date.focus();
            $("#"+alert).html("Required field");
            return false; 
         } 
         else { $("#"+alert).html(""); }
  }




function validmobile(fileName,alertarea)// function to validate mobile 1 in student registration
  {
   var mobpattern = /^[6789]\d{9}$/; 
   var contentid = $("#"+fileName);
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!mobpattern.test(contentid.val()))
       {    contentid.focus();
            $("#"+alertarea).html("Enter valid number");
            return false; 
       }  
         else { $("#"+alertarea).html(""); }
  }
function validphone(fileName,alertarea)// function to validate father name in candidate registration
  {
   var contentid = $("#"+fileName);   
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(isNaN(contentid.val()))
          {
            $("#"+alertarea).html("Enter a valid number");
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }  
function validemailid(fileName,alertarea)// function to validate emailid in student registration
  {
   var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
   var contentid = $("#"+fileName);   
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!emailreg.test(contentid.val()))
       {    contentid.focus();
            $("#"+alertarea).html("Enter valid Email id");
            return false; 
       }  
         else { $("#"+alertarea).html(""); }
  }   

  function mobileduplicatecheck(value1,value2,alertarea)// function to validate for text box
  {
      var mobpattern = /^[789]\d{9}$/; 
      var alertarea  = alertarea;
      var contentid1 = $("#"+value1);
      var contentid2 = $("#"+value2);

       if(contentid1.val() == "" || contentid1.val() == null)
         {    contentid1.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!mobpattern.test(contentid1.val()))
       {    contentid1.focus();
            $("#"+alertarea).html("Enter valid Mobile Number");
            return false; 
       }  
        else if(contentid1.val() == contentid2.val())
         {   
          contentid1.focus();
            $("#"+alertarea).html("Please enter a different Number.Number already provided.");
            return 0; 
         }
         else { $("#"+alertarea).html(""); }
    }

    
     
      function validateaadhaar(value,alertarea)// function to validate for text box
  {
     var adhaarpattern = /^\d{12}$/; 
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();          
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(isNaN(contentid.val()) || !adhaarpattern.test(contentid.val()) )
          {
            $("#"+alertarea).html("Enter a valid adhaar number");
            return false;
          }
         else { $("#"+alertarea).html(""); }
  }
   function validatetextonly(value,alertarea)// function to validate for text box
  {
     var textpatteren = /[^a-zA-Z]/; 
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(textpatteren.test(contentid.val())){
           $("#"+alertarea).html("Enter a valid text");
           return false;
         }else { $("#"+alertarea).html(""); }
  }

  function validateaddress(value,alertarea)// function to validate for text box
  {
     var addrpatteren = /[^-/,. 0-9a-zA-Z]/; 
   var alertarea  = alertarea;
    var contentid = $("#"+value); 
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
         else if(addrpatteren.test(contentid.val())){
           $("#"+alertarea).html("Enter a valid text");
           return false;
         }else { $("#"+alertarea).html(""); }
  }

function validpincode(fileName,alertarea)// function to validate mobile 1 in student registration
  {
   var pinpatterm = /^[65]\d{5}$/; 
   var contentid = $("#"+fileName);
         if(contentid.val() == "" || contentid.val() == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return false; 
         }
         else if(!pinpatterm.test(contentid.val()))
       {    contentid.focus();
            $("#"+alertarea).html("Enter valid pincode");
            return false; 
       }  
         else { $("#"+alertarea).html(""); }
  }



  function validate_fileuploadcsv(fileName,alertarea)
{ 
   
    var contentid = document.getElementById(fileName);
    var forext = contentid.value;
    var ext = forext.substring(forext.lastIndexOf('.') + 1);
        if(contentid.value == "" || contentid.value == null)
         {    contentid.focus();
            $("#"+alertarea).html("Required field");
            return 0; 
         }
        else 
        {
        $("#"+alertarea).html("");
        if(ext == "csv" ||  ext == "CSV")
        {
            return true; // valid file extension
        }  
        else
        {       
            $("#"+alertarea).html("Please Upload .csv or .CSV file formats only");
            return false;
        }
          }
}

/*$(document).ready(function() {
    $('#format_down').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );*/

    
