package src.tugasbesar.models;

public class Reservasi {
    private String idReservasi;
    private String namaPasien;
    private String namaDokter;
    private String tanggal;
    private String waktu;
    private String status;
    private String roomType; // Tipe Kamar
    private String facilities; // Fasilitas

    // Constructor
    public Reservasi(String idReservasi, String namaPasien, String namaDokter, String tanggal, String waktu, String status, String roomType, String facilities) {
        this.idReservasi = idReservasi;
        this.namaPasien = namaPasien;
        this.namaDokter = namaDokter;
        this.tanggal = tanggal;
        this.waktu = waktu;
        this.status = status;
        this.roomType = roomType;
        this.facilities = facilities;
    }

    // Getters and Setters
    public String getIdReservasi() {
        return idReservasi;
    }

    public void setIdReservasi(String idReservasi) {
        this.idReservasi = idReservasi;
    }

    public String getNamaPasien() {
        return namaPasien;
    }

    public void setNamaPasien(String namaPasien) {
        this.namaPasien = namaPasien;
    }

    public String getNamaDokter() {
        return namaDokter;
    }

    public void setNamaDokter(String namaDokter) {
        this.namaDokter = namaDokter;
    }

    public String getTanggal() {
        return tanggal;
    }

    public void setTanggal(String tanggal) {
        this.tanggal = tanggal;
    }

    public String getWaktu() {
        return waktu;
    }

    public void setWaktu(String waktu) {
        this.waktu = waktu;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getRoomType() {
        return roomType;
    }

    public void setRoomType(String roomType) {
        this.roomType = roomType;
    }

    public String getFacilities() {
        return facilities;
    }

    public void setFacilities(String facilities) {
        this.facilities = facilities;
    }
}
