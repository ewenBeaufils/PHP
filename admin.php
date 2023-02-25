<?php
include 'include.php';
require "admin/security.php";
headerPage($pdo);

if (!isset($_GET['admin'])) {
  $get = 'projects';
} else {
  $get = $_GET['admin'];
}
?>

<div class="btn-admin">
  <button class="btn waves-effect waves-light">
    <a class="white-text" href="?admin=projects">Projects</a>
  </button>
  <button class="btn waves-effect waves-light">
    <a class="white-text" href="?admin=users">Users</a>
  </button>
  <button class="btn waves-effect waves-light">
    <a class="white-text" href="?admin=skills">Skills</a>
  </button>
</div>

<div class="container">
  <?php
  switch ($get) {
    case 'users':
      $sql = "SELECT id, name, email, img, admin, as_portfolio, description FROM users";
      $pre = $pdo->prepare($sql);
      $pre->execute();
      $users = $pre->fetchAll(PDO::FETCH_ASSOC);

      foreach($users as $user) {
        
        ?>
          <div class="row">
            <form method="post" action="admin/change_user.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <div class= "input-field col s2">
                <input id="name<?= $user['id'] ?>" type="text" name="name" value="<?= isset($user['name'])?$user['name']:'' ?>"></input>
                <label for="name<?= $user['id'] ?>">NOM Prénom</label>
              </div>
              <div class= "input-field col s3">
                <input id="email<?= $user['id'] ?>" type="email" name="email" value="<?= isset($user['email'])?$user['email']:'' ?>"></input>
                <label for="email<?= $user['id'] ?>">Mail</label>
              </div>
              <div class= "input-field col s1">
                <select id="admin<?= $user['id'] ?>" name="admin">
                  <option class="white-text" value="1" <?= $user['admin']==1?'selected':'' ?>>Oui</option>
                  <option class="white-text" value="0" <?= $user['admin']==1?'':'selected' ?>>Non</option>
                </select>
                <label for="admin<?= $user['id'] ?>">Admin ?</label> 
              </div>
              <div class= "input-field col s1">
                <select id="as_portfolio<?= $user['id'] ?>" name="as_portfolio">
                  <option class="white-text" value="1" <?= $user['as_portfolio']==1?'selected':'' ?>>Oui</option>
                  <option class="white-text" value="0" <?= $user['as_portfolio']==1?'':'selected' ?>>Non</option>
                </select>
                <label for="as_portfolio<?= $user['id'] ?>">Porfolio ?</label> 
              </div>
              <div class= "input-field col s4">
                <input id="img<?= $user['id'] ?>" type="file" name="img" value="<?= isset($user['img'])?$user['img']:'' ?>"></input>
              </div>
              <div class= "input-field col s1">
                <img class="adminImg" src="<?= isset($user['img'])?$user['img']:'' ?>">
              </div>
              <div class= "input-field col s12">
                <textarea id="description<?= $user['id'] ?>" class="materialize-textarea" name="description"><?= isset($user['description'])?$user['description']:'' ?></textarea>
                <label for="description<?= $user['id'] ?>">Description</label>
              </div>
              <button class="btn waves-effect waves-light linkedin col">
                <input type="submit" value="Sauvegarder">
                <i class="material-icons right">save</i>
              </button>
            </form>
            <form method="post" action="admin/delete_user.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <button class="btn waves-effect waves-light linkedin col delete-admin">
                <input type="submit" value="Delete">
                <i class="material-icons right">delete</i>
              </button>
            </form>
          </div>
        <?php
      }
      break;

    case 'skills':
      $sql = "SELECT * FROM skills";
      $pre = $pdo->prepare($sql);
      $pre->execute();
      $skills = $pre->fetchAll(PDO::FETCH_ASSOC);

      foreach( $skills as $skill) {
        
        ?>
          <div class="row">
            <form method="post" action="admin/change_skill.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $skill['id'] ?>">
              <div class= "input-field col s5">
                <input id="title<?= $skill['id'] ?>" type="text" name="title" value="<?= isset($skill['title'])?$skill['title']:'' ?>"></input>
                <label for="title<?= $skill['id'] ?>">Title</label>
              </div>
              <div class= "input-field col s5">
                <input id="icone<?= $skill['id'] ?>" type="text" name="icone" value="<?= isset($skill['icone'])?$skill['icone']:'' ?>"></input>
                <label for="icone<?= $skill['id'] ?>">Icône <i class="<?= isset($skill['icone'])?$skill['icone']:'' ?>"></i></label>
              </div>
              <div class= "input-field col s1">
                <select id="soft<?= $skill['id'] ?>" name="soft">
                  <option class="white-text" value="1" <?= $skill['soft']==1?'selected':'' ?>>Oui</option>
                  <option class="white-text" value="0" <?= $skill['soft']==1?'':'selected' ?>>Non</option>
                </select>
                <label for="soft<?= $skill['id'] ?>">Soft ?</label> 
              </div>
              <button class="btn waves-effect waves-light linkedin col">
                <input type="submit" value="Sauvegarder">
                <i class="material-icons right">save</i>
              </button>
            </form>
            <form method="post" action="admin/delete_skill.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $skill['id'] ?>">
              <button class="btn waves-effect waves-light linkedin col delete-admin">
                <input type="submit" value="Delete">
                <i class="material-icons right">delete</i>
              </button>
            </form>
          </div>
        <?php
      }
      ?>
      <form method="post" action="admin/create_skill.php" enctype="multipart/form-data">
        <button class="btn waves-effect waves-light col delete-admin">
          <input type="submit" value="Créer un nouveau skill">
          <i class="material-icons right">add</i>
        </button>
      </form>
      <?php
      
      break;
    
    default:
      $sql = "SELECT id, name, email, img, admin, as_portfolio, description FROM users WHERE as_portfolio=1";

      $pre = $pdo->prepare($sql);
      $pre->execute();
      $users = $pre->fetchAll(PDO::FETCH_ASSOC);

      $sql = "SELECT p.id, u.name, p.description, p.img_carousel, p.img_pres, p.title, p.id_user FROM projects as p join users as u on u.id = p.id_user where u.as_portfolio = 1";
      $pre = $pdo->prepare($sql);
      $pre->execute();
      $projects = $pre->fetchAll(PDO::FETCH_ASSOC);

      foreach( $projects as $project) {
        
        ?>
          <div class="row">
            <form method="post" action="admin/change_project.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $project['id'] ?>">
              <input type="hidden" name="id_user" value="<?= $project['id_user'] ?>">
              <div class= "input-field col s4">
                <input id="projetTitle<?= $project['id'] ?>" type="text" name="title" value="<?= isset($project['title'])?$project['title']:'' ?>"></input>
                <label for="projetTitle<?= $project['id'] ?>">Titre projet</label>
              </div>
              <div class= "input-field col s4">
                <select id="id_user<?= $project['id_user'] ?>" name="id_user">
                  <?php foreach ($users as $user) { ?>
                    <option class="white-text" value="<?= $user['id']?>"<?= $project['id_user']==$user['id']?'selected':'' ?>><?= $user['name']?></option>
                  <?php } ?>
                </select>
                <label for="id_user<?= $project['id'] ?>">Proriétaire</label>
              </div>
              <div class="input-field col s4">
                <select name="skills" multiple>
                  <optgroup label="skills">
                    <?php
                    $sql = "SELECT  * FROM skills WHERE soft = 0";
                    $pre = $pdo->prepare($sql);
                    $pre->execute();
                    $skills = $pre->fetchAll(PDO::FETCH_ASSOC);

                    foreach($skills as $skill) {
                      $sql = "SELECT * FROM skills_projects WHERE id_projects=:id_projects AND id_skills=:id_skills";
                      $dataBinded=array(
                        ':id_projects' => $project['id'],
                        ':id_skills' => $skill['id']
                      );
                      $pre = $pdo->prepare($sql);
                      $pre->execute($dataBinded);
                      $skillsProjects = $pre->fetchAll(PDO::FETCH_ASSOC); ?>
                      <option value="<?= $skill['id']?>" <?= count($skillsProjects)>0?'selected':'' ?>><?=$skill["title"]?></option>
                      <?php } ?>
                  </optgroup>
                  <optgroup label="soft skills">
                  <?php
                    $sql = "SELECT  * FROM skills WHERE soft = 1";
                    $pre = $pdo->prepare($sql);
                    $pre->execute();
                    $skills = $pre->fetchAll(PDO::FETCH_ASSOC);

                    foreach($skills as $skill) {
                      $sql = "SELECT * FROM skills_projects WHERE id_projects=:id_projects AND id_skills=:id_skills";
                      $dataBinded=array(
                        ':id_projects' => $project['id'],
                        ':id_skills' => $skill['id']
                      );
                      $pre = $pdo->prepare($sql);
                      $pre->execute($dataBinded);
                      $skillsProjects = $pre->fetchAll(PDO::FETCH_ASSOC); ?>
                      <option value="<?= $skill['id']?>" <?= count($skillsProjects)>0?'selected':'' ?>><?=$skill["title"]?></option>
                      <?php } ?>
                  </optgroup>
                </select>
                <label>Skills</label>
              </div>
              <div class= "input-field col s1">
                <img class="adminImg" src="<?= isset($project['img_carousel'])?$project['img_carousel']:'' ?>">
              </div>
              <div class= "input-field col s5">
                <p>Image carousel</p>   
                <input id="projetImgCarousel<?= $project['id'] ?>" type="file" name="img_caraousel" value="<?= isset($project['img_carousel'])?$project['img_carousel']:'' ?>"></input> 
              </div>
              <div class= "input-field col s1">
                <img class="adminImg" src="<?= isset($project['img_pres'])?$project['img_pres']:'' ?>">
              </div>
              <div class= "input-field col s5">
                <p>Image présentation<p>  
                <input id="projetImgPres<?= $project['id'] ?>" type="file" name="img_pres" value="<?= isset($project['imp_pres'])?$project['img_pres']:'' ?>"></input>
              </div>

              <div class= "input-field col s12">
                <textarea id="projectDescription<?= $project['id'] ?>" class="materialize-textarea" name="description"><?= isset($project['description'])?$project['description']:'' ?></textarea>
                <label for="projectDescription<?= $project['id'] ?>">Description</label>
              </div>
              <button class="btn waves-effect waves-light linkedin col">
                <input type="submit" value="Sauvegarder">
                <i class="material-icons right">save</i>
              </button>
            </form>
            <form method="post" action="admin/delete_project.php" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $project['id'] ?>">
              <button class="btn waves-effect waves-light linkedin col delete-admin">
                <input type="submit" value="Delete">
                <i class="material-icons right">delete</i>
              </button>
            </form>
          </div>
        <?php
      }?>
      <form method="post" action="admin/create_project.php" enctype="multipart/form-data">
        <button class="btn waves-effect waves-light col delete-admin">
          <input type="submit" value="Créer un nouveau projet">
          <i class="material-icons right">add</i>
        </button>
      </form>
      
      <?php break;
  }
  ?>
</div>

<?php
footerPage($pdo);
?>
<script>
  $(document).ready(function() {
    $(":checkbox").each(function( index ) {
      $(this).attr('name', String($(this).parent().children("span").text().replaceAll(' ', '|-|')));
    });
  });
</script>