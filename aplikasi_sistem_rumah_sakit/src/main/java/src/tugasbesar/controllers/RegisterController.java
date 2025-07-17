package src.tugasbesar.controllers;

import javafx.fxml.FXML;
import javafx.scene.control.TextField;
import javafx.scene.control.PasswordField;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import java.io.IOException;

public class RegisterController {

    @FXML
    private TextField usernameField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private PasswordField confirmPasswordField;

    @FXML
    private void onRegisterButtonClick() {
        // Logika untuk menangani pendaftaran
        String username = usernameField.getText();
        String password = passwordField.getText();
        String confirmPassword = confirmPasswordField.getText();

        if (password.equals(confirmPassword)) {
            // Pendaftaran berhasil, arahkan ke halaman login
            System.out.println("Registration successful for username: " + username);
            try {
                FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/login.fxml"));
                Stage stage = (Stage) usernameField.getScene().getWindow();
                Scene scene = new Scene(loader.load());
                stage.setScene(scene);
                stage.setTitle("Login");
                stage.show();
            } catch (IOException e) {
                e.printStackTrace();
            }
        } else {
            System.out.println("Passwords do not match.");
        }
    }
}
