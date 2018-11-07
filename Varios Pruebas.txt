use visdecli;
select * from vis_productos inner join vis_precios on vis_productos.p_cod_pro=vis_precios.p_cod_pro where vis_precios.p_cod_mes='10';