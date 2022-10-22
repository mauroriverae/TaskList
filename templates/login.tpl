{include file="templates/header.tpl" }

<div class="container">

    <div class="row mt-4">
        <div class="col-md-3 ">
            <h2>Log In</h2>
            <form class="form-alta" action="verify" method="POST">
                <input placeholder="email" type="text" name="email" required style="margin: 20px;">
                <input placeholder="password" type="password" name="password" id="password" required style="margin: 20px;">
                <input type="submit" class="btn btn-primary " name="title" value="Login" style="margin: 20px;" >
            </form>
        </div>
        <h4 class="alert alert-danger text-center">{$error}</h4>
    </div>

</div>

{include file="templates/footer.tpl" }