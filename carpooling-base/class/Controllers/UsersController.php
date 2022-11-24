<?php

namespace App\Controllers;

use App\Services\UsersService;

class UsersController
{
    /**
     * Return the html for the create action.
     */
    public function createUser(): string
    {
        $html = '';
        
        // If the form have been submitted :
        if (isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday']) &&
            isset($_POST['cars'])) {
            // Create the user :
            $usersService = new UsersService();
            $userId = $usersService->setUser(
                null,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
                );
            
            // Create the user cars relations :
            $isOk = true;
            if (!empty($_POST['cars'])) {
                foreach ($_POST['cars'] as $carId) {
                    $isOk = $usersService->setUserCar($userId, $carId);
                }
            }
            if ($userId && $isOk) {
                $html = '<div class="alert alert-success" role="alert">User successfully created.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">User creation failed.</div>';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getUsers(): string
    {
        $html = '';

        // Get all users :
        $usersService = new UsersService();
        $users = $usersService->getUsers();

        // Get html :
        foreach ($users as $user) {
            $html .=
                '<tr>'.
                '<td>'.$user->getId().'</td>'.
                '<td>'.$user->getFirstname().'</td>'.
                '<td>'.$user->getLastname().'</td>'.
                '<td>'.$user->getEmail().'</td>'.
                '<td>'.$user->getBirthday()->format('d-m-Y').'</td>'.
                '<td>';
                
            foreach($user->getCars() as $car) {
                $html .=
                    $car->getBrand().' '.
                    $car->getModel().' | '.
                    $car->getColor().' | '.
                    $car->getNbrSlots().' seats | '.
                    $car->getMineral().
                '<br/>';
            }
            
            $html .= '</td>'.
                     '<td>'.
                     '<a href="users_update.php?id='.$user->getId().'">Update</a>'.
                     ' | '.
                     '<a href="users_delete.php?id='.$user->getId().'">Delete</a>'.
                     '</td>';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday'])) {
            // Update the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                $_POST['id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">User successfully updated.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">User update failed.</div>';
            }
        }

        return $html;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $usersService = new UsersService();
            $isOk = $usersService->deleteUser($_POST['id']);
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">User successfully deleted.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">User delete failed.</div>';
            }
        }

        return $html;
    }
}
