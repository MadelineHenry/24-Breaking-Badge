<?php include('./components/navbarAdmin.php');?>
<main>
    <div class="all_the_edit_page">

        <div class="modify_delete">
            <form class="formulaire_modification" method="post">

                <h2>Modify or delete an existent badge</h2>

                <p><label class="label_modify">Select a badge</label></p>

                <p><select class="select_badge" name="badge" id=""></select></p>

                <p><label class="label_modify">Modify the name of the badge :</label></p>

                <p><input class="modify_name" type="text" name="modif_name" required></p>

                <p><label class="label_modify">Modify the description of the badge :</label></p>

                <p><textarea class="description" type="text" id='textarea' name="modif_description" required></textarea>
                </p>

                <p><label class="label_modify">Modify the color of the badge :</label></p>

                <p><input class="modify_color" type="text" name="modif_color" required></p>

                <!-- <td class="boutons_modif_delete"> -->

                <p class="boutons_modif_delete">
                    <input class='bouton_modify' type="submit" id="modify_badge" value="Modify" />
                    <input class='bouton_delete' type="submit" id="delete_badge" value="Delete" />
                </p>


            </form>
        </div>
        <div class="create_new_badge">
            <form class="formulaire_modification" method="post">

                <h2>Create a new badge</h2>

                <p><label class="label_create">Name of the badge :</label></p>

                <p><input class="create_name" type="text" name="modif_name" required></p>

                <p><label class="label_create">Description of the badge :</label></p>

                <p><textarea class="create_description" type="text" id='textarea' name="modif_description" required></textarea>
                </p>

                <p><label class="label_create">Color of the badge :</label></p>

                <p><input class="create_color" type="text" name="modif_color" required></p>

                <!-- <td class="boutons_modif_delete"> -->

                <p class="boutons_create">
                    <input class='bouton_create' type="submit" id="modify_badge" value="Create" />
                    
                </p>


            </form>

        </div>

    </div>
</main>