<form method="post" action="<?= base_url($action) ?>">
    <!-- id -->
    <div class="mb-3">
        <label for="id" class="form-label">id</label>
        <input type="text" class="form-control form-control-plaintext" name="id" id="id" value="<?= $route->id ?>" readonly>
    </div>
    <!-- name -->
    <div class="mb-3">
        <label for="name" class="form-label">Vorname</label>
        <input type="text" class="form-control <?= $plaintext_class ?>" name="vorname" id="vorname" aria-describedby="name__help" value="<?= $route->vorname ?>"<?= $readonly_attr ?>>
        <div id="name__help" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <!-- name -->
    <div class="mb-3">
        <label for="name" class="form-label">Nachname</label>
        <input type="text" class="form-control <?= $plaintext_class ?>" name="nachname" id="nachname" aria-describedby="name__help" value="<?= $route->nachname ?>"<?= $readonly_attr ?>>
        <div id="name__help" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <!-- street -->
    <div class="mb-3">
        <label for="street" class="form-label">street</label>
        <input type="text" class="form-control <?= $plaintext_class ?><?= isset($errors['street']) ? ' is-invalid' : '' ?>" name="street" id="street" value="<?= $route->street ?>"<?= $readonly_attr ?> >
        <div id="validationStreetFeedback" class="invalid-feedback"><?= $errors['street'] ?? '' ?></div>
    </div>
    <!-- postcode -->
    <div class="mb-3">
        <label for="postcode" class="form-label">postcode</label>
        <input type="text" class="form-control <?= $plaintext_class ?> <?= isset($errors['postcode']) ? 'is-invalid' : '' ?>" name="postcode" id="postcode" value="<?= old('postcode', $route->postcode) ?>"<?= $readonly_attr ?>>
        <div id="validationPostcodeFeedback" class="invalid-feedback"><?= $errors['postcode'] ?? '' ?></div>
    </div>
    <!-- state -->
    <div class="mb-3">
        <label for="state" class="form-label">state</label>
        <input type="text" class="form-control <?= $plaintext_class ?>" name="state" id="state" value="<?= $route->state ?>"<?= $readonly_attr ?>>
    </div>
    <!-- city -->
    <div class="mb-3">
        <label for="city" class="form-label">city</label>
        <input type="text" class="form-control <?= $plaintext_class ?>" name="city" id="city" value="<?= $route->city ?>"<?= $readonly_attr ?>>
    </div>
    <!-- country -->
    <div class="mb-3">
        <label for="country" class="form-label">country</label>
        <input type="text" class="form-control <?= $plaintext_class ?>" name="country" id="country" value="<?= $route->country ?>"<?= $readonly_attr ?>>
    </div>

    <?php if ($action==='') : ?>

        <a role="button" href="<?= base_url('route/edit/'.$route->id) ?>" class="btn btn-primary">Edit</a>

    <?php elseif (str_contains($action, 'delete')) : ?>

        <a role="button" href="<?= base_url('route') ?>" class="btn btn-primary">Abbort</a>
        <button type="submit" class="btn btn-danger">Delete</button>

    <?php elseif ($action!=='') : ?>
        
        <a role="button" href="<?= base_url('route/'.$route->id) ?>" class="btn btn-primary">Abbort</a>
        <button type="submit" class="btn btn-primary">Save</button>

    <?php endif ?>

</form>
