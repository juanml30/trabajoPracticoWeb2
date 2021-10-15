{* Incluímos el header *}
{include file = 'templates/header.tpl'}

{* Titulo modificación *}
<h1 class="title"> {$titulo} </h1>


<form name='formulario' action='modificar/{$producto->id}' method='GET' class='my-4'>
    <div class='row'>
        <div class='col-2'>
            <div class='form-group'>
                <label>SKU</label>
                <input name='sku' type='text' class='form-control' value={$producto->sku}>
            </div>
        </div>
        <div class='col-5'>
            <div class='form-group'>
                <label>Descripcion</label>
                <input name='descripcion' type='text' class='form-control' value="{$producto->descripcion}">
            </div>
        </div>
        <div class='col-2'>
            <div class='form-group'>
                <label>Precio</label>
                <input name='precio' class='form-control' value={$producto->precio}>
            </div>
        </div>
        <div class='col-2'>
            <div class='form-group'>
                <label>Categoria</label> 
                <select class='form-control' name='categoria'>
                    {foreach from=$categorias item=$categoria}    
                        {if $categoria->id == $producto->categoria}
                            <option selected value="{$categoria->id}"> {$categoria->descripcion}</option>
                        {else}
                            <option value="{$categoria->id}"> {$categoria->descripcion}</option>
                        {/if}
                    {/foreach}
                </select>   
            </div>
        </div>
        <div class='col-1'>
            <div class='form-group'>
                <label>Stock</label>
                <input name='stock' class='form-control' value={$producto->stock}>
            </div>
        </div>
    </div>
    <button type='submit' class='btn btn-primary mt-2'>Guardar Modificación</button>
</form>

{* Incluímos el footer *}
{include file = 'templates/footer.tpl'}