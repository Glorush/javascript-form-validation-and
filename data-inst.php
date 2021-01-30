<?php require_once('header.php'); ?>
    
<!--
===================================================================
                        Start Register Section
===================================================================
-->

<!-- <?php 

if(isset($_POST['submit'])){

    $book_name = $_POST['book_name'];

    if(empty($book_name)){
        $error = "Field is Required !";
    }
}


?> -->

<section class="dataInsert">
    <div class="container">
        <div class="row">
            <div class=" offset-md-4 col-md-6">
                <div class="ar-register-form ar-form ">
                    <h2 class="text-center">Selling Books</h2>
                    <form action="" method="POST" id="SellingBookForm" name="myForm" onsubmit="return FileValidation()">

                        <div class="ar-form-group-style">
                            <label  for="book_name">Book Name*</label>
                            <input type="text" placeholder="Type Book Name..." name="book_name"  class="form-control" id="book_name">
                            <div id="b_n_message" class="invalid-feedback"></div>
                        </div>
                        
                        
                        <div class="ar-form-group-style">
                            <label for="sub_code">Subject Code*</label>
                            <input type="text" placeholder="Type Subject Code..." name="sub_code" class="form-control" id="sub_code">
                            <div id="b_c_message" class="invalid-feedback"></div>
                        </div>
                        

                        <div class="ar-form-group-style">
                            <label for="dpt">Department*</label>
                            <select name="dpt" id="dpt" class="form-control">
                                <option value="">Select</option>
                                <option value="cmt">Computer</option>
                                <option value="food">Food</option>
                                <option value="aidt">Aidt</option>
                                <option value="rac">Rac</option>
                                <option value="mac">Mac</option>
                            </select>
                            <div id="dpt_message" class="invalid-feedback"></div>
                        </div>
                        

                        <div class="ar-form-group-style">
                            <label for="sem">Semester*</label>
                            <select name="sem" id="sem" class="form-control">
                                <option value="">Select</option>
                                <option value="1st-sem">1st</option>
                                <option value="2nd-sem">2nd</option>
                                <option value="3rd-sem">3rd</option>
                                <option value="4th-sem">4th</option>
                                <option value="5th-sem">5th</option>
                                <option value="6th-sem">6th</option>
                                <option value="7th-sem">7th</option>
                            </select>
                            <div id="sem_message" class="invalid-feedback"></div>
                        </div>
                        

                         <div class="ar-form-group-style">
                            <label for="book_image">Book Image*</label>
                            <input type="file" name="book_image" placeholder="Choose File" class="form-control" id="book_image">
                            <div id="b_img_message" class="invalid-feedback"></div>
                         </div> 

                         <div class="ar-form-group-style">
                            <label for="book_price">Book Price*</label>
                            <input type="text" name="book_price" placeholder="Book Pirce..." class="form-control" id="book_price">
                            <div id="b_p_message" class="invalid-feedback"></div>
                         </div> 

                         <div class="cl-effect-19">  
                             <button class="skl" type="submit"><span data-hover="Submit">Submit</span></button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
 
<!--
===================================================================
                        End Register Section
===================================================================
-->



   <?php require_once('footer.php'); ?>

   <script>
       $('#SellingBookForm').on('submit',function(e){
            e.preventDefault();

            var book_name = $('#book_name').val();
            var sub_code = $('#sub_code').val();
            var dpt = $('#dpt').val();
            var sem = $('#sem').val();
            var book_image = $('#book_image').val();
            var book_price = $('#book_price').val();

            // book Name
            if (book_name.length == 0 ) {
                $('#b_n_message').show().text('Book Name Field is Required !');
            }
            else{
                $('#b_n_message').hide();
            }
            // subject code
            if (sub_code.length == 0 ) {
                $('#b_c_message').show().text('Subject Code Field is Required !');
            }
            else{
                if(isNaN(sub_code)){
                    $('#b_c_message').show().text('Type Numeric Number');
                }
                else{
                    if(sub_code.length != 5){
                        $('#b_c_message').show().text('Type 5 digit number');
                    }
                    else{
                        $('#b_c_message').hide();
                    }
                }
            }
            // dpeartment
            if(dpt.length == 0){
                $('#dpt_message').show().text('Select Your Department Name!');
            }
            else{
                $('#dpt_message').hide();
            }
            // semester
            if(sem.length == 0){
                $('#sem_message').show().text('Select Semester Name!');
            }
            else{
                $('#sem_message').hide();
            }
            // book Price
            if(book_price.length == 0){
                $('#b_p_message').show().text('Price must be added');
            }
            else{
                if(isNaN(book_price)){
                    $('#b_p_message').show().text('Type Only Number');
                }
                else{
                    if(book_price.length >=4){
                        $('#b_p_message').show().text('ONly used 3 digit number');
                    }
                    else{
                        if(book_price <= 0){
                            $('#b_p_message').show().text("Type valide Number");
                        }
                        else{
                            $('#b_p_message').hide();
                        }
                    }
                }
            }
       })


       // image validation
        var b_images = document.forms['myForm']['book_image'];
        var b_validExt=["jpg","jpeg","png","JPG","JPEG","PNG"];
        function FileValidation(){
            if(b_images.value == ''){
                $('#b_img_message').show().text('No image Selected');
            }
            else{
                // image extenditon
                var pos_of_dot = b_images.value.lastIndexOf(".")+1;
                var b_images_ext = b_images.value.substring(pos_of_dot);

                var result = b_validExt.includes(b_images_ext);
                if(result == false){
                    $('#b_img_message').show().text('Supported image is jpg/jpeg/png');
                }
                else{
                    if(parseFloat(b_images.files[0].size/(1024*1024))>=5){
                        $('#b_img_message').show().text('Image is Too large max size 5MB');
                    }
                    else{
                        $('#b_img_message').hide();
                    }
                }
            }
        }
   </script>




