package src.tugasbesar.controllers;

import javafx.fxml.FXML;
import javafx.scene.control.TextField;
import javafx.scene.control.PasswordField;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import java.io.IOException;

public class LoginController {

    @FXML
    private TextField usernameField;

    @FXML
    private PasswordField passwordField;

    @FXML
    private void onLoginButtonClick() {
        // Logika untuk menangani login
        String username = usernameField.getText();
        String password = passwordField.getText();

        // Verifikasi login dan jika berhasil, arahkan ke dashboard
        System.out.println("Login attempted with username: " + username + " and password: " + password);

        // Arahkan ke halaman dashboard setelah login berhasil
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/src/tugasbesar/dashboard.fxml"));
            Stage stage = (Stage) usernameField.getScene().getWindow();
            Scene scene = new Scene(loader.load());
            stage.setScene(scene);
            stage.setTitle("Dashboard");
            stage.show();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}
