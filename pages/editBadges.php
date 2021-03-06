<?php include('./components/navbarAdmin.php');
deleteOrModifyBadge();
createNewBadge();
?>

<main>
    <div class="all_the_edit_page">

        <div class="modify_delete">
            <form class="formulaire_modification" method="post">

                <h2 class="title_formulaire">Modify or delete an existent badge</h2>

                <p><label class="label_modify">Select a badge</label></p>

                <p><select class="select_badge" name="badgeToModify" id="">

                    </select></p>

                <p><label class="label_modify">Name of the badge :</label></p>

                <p><input class="modify_name" type="text" name="modif_name" placeholder="Modify the name..." required></p>

                <p><label class="label_modify">Description of the badge :</label></p>

                <p><textarea class="description" type="text" id='textarea' name="modif_description" placeholder="Modify the description..."required></textarea>
                </p>

                <p><label class="label_modify">Color of the badge :</label></p>

                <p><input class="modify_color" type="text" name="modif_color" placeholder="Modify the color..."required></p>

                <!-- <td class="boutons_modif_delete"> -->

                <p class="boutons_modif_delete">
                    <input class='bouton_modify' type="submit" name="modify_badge" value="Modify" />
                    <input class='bouton_delete' type="submit" name="delete_badge" value="Delete" />
                </p>


            </form>
        </div>
        <div class="create_new_badge">
            <form class="formulaire_creation" method="post">

                <h2 class="title_formulaire">Create a new badge</h2>

                <p><label class="label_create">Name of the badge :</label></p>

                <p><input class="create_name" type="text" name="new_name" required></p>

                <p><label class="label_create">Description of the badge :</label></p>

                <p><textarea class="create_description" type="text" id='textarea' name="new_description" required></textarea>
                </p>

                <p><label class="label_create">Color of the badge :</label></p>

                <p><input class="create_color" type="text" name="new_color" required></p>

                <!-- <td class="boutons_modif_delete"> -->

                <p class="ensemble_bouton_create">
                    <input class='bouton_create' type="submit" name="new_badge" value="Create" />
                </p>


            </form>

        </div>

    </div>
</main>

<script>

</script>
<script src="./assets/getBadges.js"></script>