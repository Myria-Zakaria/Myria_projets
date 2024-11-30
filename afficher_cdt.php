
 

   <!-- Hero Start -->
   <div class="container-fluid bg-light py-6 my-6 mt-0">
   <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-7 col-md-12">
        <h1 class="display-1 mb-4 animated bounceInDown" ><span class="text-primary"><?php echo "Afficher votre candidature" ?></span></h1>
        <?php echo form_open('/candidature/trouver'); ?>

               <div class="container1">
                   <div class="part1">
                           <?= csrf_field() ?>
                           <div class="id">
                           <label for="code_id">Votre identifiant (8 caractères) </label>
                           </div>  
                            <div class="pseudo1">
                            <input type="text" name="code_id">
                            <?= validation_show_error('code_id') ?>
                              </div>
                  </div>
                  <div class="part2">
                     <div class="cdt">
                     <label for="code_cdt">Le code de votre candidature (20 caractères)</label>
                     </div>
                          <div class="mdp1">
                           <input type="text" name="code_cdt">
                           <?= validation_show_error('code_cdt') ?>
                           </div>
                   </div>

              </form>
                <input type="submit" name="submit" value="Valider">

                 </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <img src="../../documents/cak6.jpg" class="img-fluid rounded animated zoomIn" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->




