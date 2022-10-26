{include file="templates/header.tpl"}


<div class="container">

    <form action="add" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Título</label>
                    <input name="title" type="text" class="form-control">
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label>Prioridad</label>
                    <select name="priority" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>
    <div class="col-md-8">
        <h1>Titulo</h1>
        <ul id="tasklist" class="list-group">

        </ul>
    </div>
</div>


{include file="templates/footer.tpl"}
