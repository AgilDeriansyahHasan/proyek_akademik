package src.tugasbesar.controllers;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.stage.Stage;

import java.io.IOException;

public class DashboardController {

    @FXML
    private Label welcomeDashboardText;

    @FXML
    private Label newPatientsCount;

    @FXML
    private Label activeReservationsCount;

    @FXML
    private Label medicinesSoldCount;

    @FXML
    private Button managePatientsButton;

    @FXML
    private Button manageReservationsButton;

    @FXML
    private Button manageMedicinesButton;

    @FXML
    private Button viewReportsButton;

    public void initialize() {
        // Inisialisasi teks selamat datang
        welcomeDashboardText.setText("Selamat datang, Dr. John Doe");

        // Inisialisasi data statistik (contoh data)
        newPatientsCount.setText("15");
        activeReservationsCount.setText("8");
        medicinesSoldCount.setText("23");
    }

    @FXML
    private void onManagePatientsButtonClick() {
        navigateTo("/src/tugasbesar/ManagePatients.fxml");
    }

    @FXML
    private void onManageReservationsButtonClick() {
        navigateTo("/src/tugasbesar/ManageReservations.fxml");
    }

    @FXML
    private void onManageMedicinesButtonClick() {
        navigateTo("/src/tugasbesar/ManageMedicines.fxml");
    }

    @FXML
    private void onViewReportsButtonClick() {
        navigateTo("/src/tugasbesar/ViewReports.fxml");
    }

    private void navigateTo(String fxmlPath) {
        try {
            // Memuat file FXML halaman tujuan
            FXMLLoader loader = new FXMLLoader(getClass().getResource(fxmlPath));
            Parent root = loader.load();

            // Mengatur scene baru pada stage saat ini
            Stage stage = (Stage) welcomeDashboardText.getScene().getWindow();
            stage.setScene(new Scene(root));
        } catch (IOException e) {
            e.printStackTrace();
            System.err.println("Gagal memuat halaman: " + fxmlPath);
        }
    }
}
