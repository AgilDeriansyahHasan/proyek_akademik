package src.tugasbesar.models;

public class Reports {

    private String category; // Kategori: Dokter, Obat, Kamar
    private String detail1;  // Detail spesifik, seperti spesialisasi
    private String detail2;  // Nama dokter
    private int numericDetail; // Data numerik, misalnya jumlah pasien

    // Constructor
    public Reports(String category, String detail1, String detail2, int numericDetail) {
        this.category = category;
        this.detail1 = detail1;
        this.detail2 = detail2;
        this.numericDetail = numericDetail;
    }

    // Getter dan Setter
    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getDetail1() {
        return detail1;
    }

    public void setDetail1(String detail1) {
        this.detail1 = detail1;
    }

    public String getDetail2() {
        return detail2;
    }

    public void setDetail2(String detail2) {
        this.detail2 = detail2;
    }

    public int getNumericDetail() {
        return numericDetail;
    }

    public void setNumericDetail(int numericDetail) {
        this.numericDetail = numericDetail;
    }
}
