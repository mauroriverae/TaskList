{include file="templates/header.tpl" }
{include file="templates/form_alta.tpl" }
<div class="container">
    <ul class="list-group">
    {foreach from=$tasks item=$task }    
        <li class="
            list-group-item d-flex justify-content-between 
            {if $task->finalizada} finalizada {/if}
        ">
            <span> <b>{$task->titulo}</b> - {$task->descripcion }(prioridad {$task->prioridad}) </span>
            <div>
            <a href="delete/{$task->id_tarea}" type='button' class='btn btn-danger'>Borrar</a>
            {if !$task->finalizada}
                <a href="update/{$task->id_tarea}" type='button' class='btn btn-success'>Finalizar</a>
            {/if}
            </div>
        </li>
    {/foreach}
    </ul>
</div>

{include file="templates/footer.tpl" }