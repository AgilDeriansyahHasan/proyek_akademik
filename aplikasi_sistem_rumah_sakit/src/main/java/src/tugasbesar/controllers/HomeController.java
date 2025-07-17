package src.tugasbesar.controllers;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javafx.fxml.FXMLLoader;
import java.io.IOException;

public class HomeController {

    @FXML
    private Button registerButton;  // Tambahkan deklarasi tombol Register

    @FXML
    private Button loginButton;  // Tambahkan deklarasi tombol Login

    @FXML
    private void onRegisterButtonClick() {
        // Logika untuk membuka halaman register
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/register.fxml"));
            Stage stage = (Stage) registerButton.getScene().getWindow();
            Scene scene = new Scene(loader.load());
            stage.setScene(scene);
            stage.setTitle("Register");
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void onLoginButtonClick() {
        // Logika untuk membuka halaman login
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/login.fxml"));
            Stage stage = (Stage) loginButton.getScene().getWindow();
            Scene scene = new Scene(loader.load());
            stage.setScene(scene);
            stage.setTitle("Login");
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
