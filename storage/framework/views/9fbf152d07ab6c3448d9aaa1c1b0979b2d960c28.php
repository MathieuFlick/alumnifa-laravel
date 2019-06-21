<?php $__env->startSection('title', 'Inscription'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Register')); ?></div>
                
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('auth.register')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="pseudo">Pseudo</label>
                                <input id="pseudo" type="text" class="form-control <?php if ($errors->has('pseudo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pseudo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="pseudo" value="<?php echo e(old('pseudo')); ?>" required autofocus>
                                <?php if ($errors->has('pseudo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pseudo'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                             <div class="col-md-6">
                                <label for="email">Adresse e-mail</label>
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                             <div class="col-md-6">
                                <label for="dob">Date de naissance</label>
                                <input id="dob" type="date" class="form-control <?php if ($errors->has('dob')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dob'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="dob" value="<?php echo e(old('dob')); ?>" required>
                                <?php if ($errors->has('dob')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dob'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="firstname">Prénom</label>
                                <input id="firstname" type="text" class="form-control <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="firstname" value="<?php echo e(old('firstname')); ?>" required>
                                <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Nom de famille</label>
                                <input id="lastname" type="text" class="form-control <?php if ($errors->has('lastname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lastname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                                <?php if ($errors->has('lastname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lastname'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password">Mot de passe</label>
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required>
                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm">Confirmez votre mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </div>
                    </form>
                    <?php echo e(session('error') ?? null); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alumnifa\resources\views/auth/register.blade.php ENDPATH**/ ?>