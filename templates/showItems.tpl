
{* Incluímos el header *}
{include file = 'templates/header.tpl'}

{* Encabezado de la lista *}
<h1 class="title"> {$titulo} </h1>
<ul class="list-group list-unstyled mt-5">
<table class='table table-sm'>
    <tr>
        <th>ID</th>
        <th>DESCRIPCION</th> 
        <th>PRECIO</th> 
        <th>CATEGORIA</th>
    </tr>
{* listado *}
    {foreach from=$items item=item}
        <tr>
            <td>{$item->id}</td> 
            <td>{$item->descripcion}</td> 
            <td>{$item->precio}</td> 
            <td>{$item->categoria}</td>
            <td class='d-inline p-2'><a class='btn btn-primary btn-sm' href='VerDetalleProducto/{$item->id}'>Ver detalle<a></td>
        </tr>    
    {/foreach}

</table>

{* Incluímos el footer *}
{include file = 'templates/footer.tpl'}