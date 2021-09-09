<?php if(!isset($_POST['is_ajax'])):?>
<?php get_header(); ?>
<div class="row cuerpo" >
   

<div class="row seccion-pagina">
        <div class="cuadricula">
            <div class="cuadro grande-1 medio-2 chico-12">
                <span>Bolsa</span>
            </div>

        <!-- <div class="cuadro medio-10 grande-11 chico-12 slider-home"> -->
        
            <?php 
                    $sucursales = array(
                            'post_type'=> 'valpa_sucursales_pt',
                            'order'    => 'ASC',
                            'posts_per_page' => -1,
                            'order' => 'DESC',
                        );              
                 

                    $sucursales_query = new WP_Query( $sucursales );
                    if($sucursales_query->have_posts() ) : while ( $sucursales_query->have_posts() ) : $sucursales_query->the_post(); 
                    ?>   

                        <div class="cuadro medio-10 grande-11 chico-12 slider-home">
                            <!-- <h2> 
                                <?php  echo $post->post_title; ?> <span><?php  echo $post->post_content; ?></span>
                            </h2> -->
                             <?php 
                                $id_sucursal = $post->ID;
                                 $puestos = array(
                                    'post_type'=> 'valpa_trabajos_pt',
                                    'order'    => 'ASC',
                                    'posts_per_page' => -1,
                                    'order' => 'DESC',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'sucursal_relacionada_meta',
                                            'value' => $post->ID,
                                            'compare' => 'LIKE',

                                        ),
                                      ),
                                );  
    


                                $the_query = new WP_Query( $puestos );
                                if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                ?>   


                           <div class="cuadro medio-6 grande-12 chico-12 slider-home cuadro-trabajo" style="border-bottom: 20px solid 
                           <?php echo get_post_meta( $empresa_relacionada, 'color_destacado_meta', true ); ?>;"> <!-- Color Estilo -->
                           
                           <!-- <?php  echo $post->post_title; ?><br><br> Imprime Puesto -->
                           &nbsp;&nbsp;<?php echo get_the_title( $empresa_relacionada); ?><br><br> <!-- Imprime Empresa -->
                           <p class="fa fa-map-marker"> <?php echo get_post_meta( $empresa_relacionada, 'datos_destacado_meta', true ); ?> </p><br><!-- Imprime Ubicacion-->         
                           <a href="<?php echo get_permalink();?>?sucursal=<?php echo $id_sucursal;?>&puesto=<?php echo $post->ID;?>">Ver mas</a>
                           
                           <!-- echo "<a href='$link' title='$linktitle'>$linkname</a>"; -->
                               
                           </div>


                                <?php endwhile; ?>
                            <?php else: ?>
                                Por el momento no tenemos puestos de trabajo en esta sucursal

                                <?php endif?>
                             
                        </div>
                    <?php endwhile; ?>

                    <?php endif?>


    </div>
    </div>   
    <? endif;?>
    <?php include_once('inc/cerca.php'); ?>

   
   <?php include_once('inc/asociado-bolsa.php'); ?>

</div>
       

        
<?php get_footer(); ?>