<?php get_header(); ?>
<div class="row cuerpo" id="inicio" >

<div class="row seccion-pagina" data-scroll-index="inicio">
        <div class="columns grande-1 medio-2 chico-12">
            <span>Noticias</span>
            </div>
            <div class="columns medio-10 grande-11 chico-12">
                <!-- Slider main container -->
                <div class="swiper-container">
                <!-- Additional required wrapper -->
                <?php $nostros = get_page_by_title('nosotros');?>
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <a href="<?php echo get_permalink($nostros->ID) ?>" class="swiper-slide" style="background-image: url(https://www.temporal.sumario.mx/proxima/wp-content/themes/proxima-theme/images/portada-metapath.png);padding: 40px 60px;background-size: cover;"></a>
                    <a href="<?php echo get_permalink($nostros->ID) ?>" class="swiper-slide" style="background-image: url(https://cognicert.com/wp-content/uploads/2021/06/iStock-135018895.jpg);padding: 40px 60px;background-size: cover;"></a>
                    <a href="<?php echo get_permalink($nostros->ID) ?>" class="swiper-slide" style="background-image: url(https://images.squarespace-cdn.com/content/v1/58d24ae4ff7c508a02bdce8a/1610752979680-XFF5CT2LFPFREL0A5WY8/funeral.png?format=750w);padding: 40px 60px;background-size: cover;"></a>
                </div> 
            </div>
            </div>
            </div>


    <div class="row seccion-pagina">
        <div class="cuadricula">
            <div class="cuadro grande-1 medio-2 chico-12">
                <span>Vacantes</span>
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
                                    'posts_per_page' => 3,
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


                           <div class="cuadro grande-4 chico-12 cuadro-trabajo" style="border-bottom: 20px solid 
                           <?php echo get_post_meta( $empresa_relacionada, 'color_destacado_mb', true ); ?>;"> <!-- Color Estilo -->
                           
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




	<div class="row seccion-empresa" style="background:white">
        <div class="cuadricula">
            <div class="cuadro grande-1 medio-2 chico-12">
                <span>Empresas</span>
            </div>
			
            <div class="cuadro medio-10 grande-11 chico-12 slider-home">
                <div class="row">
                    <div class="cuadricula">
                    <?php 
				        $empresas = get_posts( array(
				            'post_type' => 'empresas_pt',
				            'posts_per_page' => 4,
				            'orderby' => 'post_date', 
				            'order' => 'ASC',
				        ) );
				 			
				            foreach ( $empresas as $empresa ):
								$logo_empresa = get_post_meta( $empresa->ID, 'logo_destacado_meta', true ); 
                            
						?>
                            <div class="cuadro grande-3 medio-6 chico-12 cuadro-trabajo logo-empresa2">
                                <a href="<?php echo get_permalink($empresa->ID); ?>"><?php echo $logo_empresa; ?></a>
                            </div>
                            <?php endforeach;?>             
                    </div>
                </div>
            </div>
        </div>
    </div>


	<div class="row seccion-nosotros">
            <div class="columns grande-1 medio-2 chico-12">
                <span>Nosotros</span>
            </div>

            <div class="columns medio-12 grande-11 chico-12"> 
                <?php $nostros = get_page_by_title('nosotros');
                    $img_nosotros = get_the_post_thumbnail_url($nostros->ID);
                    $image_id = get_post_thumbnail_id($nostros->ID);
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                ?>
                <img style="width: 900px;" alt="<?php echo $image_alt  ?>" src="<?php echo $img_nosotros  ?>">
                <?php echo $nostros->post_content ?>
            </div>
    </div>


    <div class="seccion-insta">
        <div class="cuadricula">
            <div class="cuadro grande-1 medio-2 chico-12">
                <span>Instagram</span>
            </div>
            <div class="cuadro medio-10 grande-11 chico-12 slider-home">
                <div class="row">
                    <div class="cuadricula">
                        <div class="cuadro grande-4 chico-12 cuadro-trabajo">
                           <a href="https://www.instagram.com/" target="_Blank"><img class="img-insta" src="<?php bloginfo('template_url'); ?>/images/proxima/proxima-instagram.png"></a>
                        </div>

                        <div class="cuadro grande-4 chico-12 cuadro-trabajo2">
                            <a href="https://www.instagram.com/" target="_Blank"><img class="img-insta" src="<?php bloginfo('template_url'); ?>/images/proxima/proxima-instagram.png"></a>
                        </div>

                        <div class="cuadro grande-4 chico-12 cuadro-trabajo3">
                            <a href="https://www.instagram.com/" target="_Blank"><img class="img-insta" src="<?php bloginfo('template_url'); ?>/images/proxima/proxima-instagram.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

						
</div>

<?php get_footer(); ?>