package Filosofos;

public class Filosofo {

    private String nombre;
    private int palilloIzq;
    private int palilloDcha;

    private boolean tieneIzq;
    private boolean tieneDcha;

    public Filosofo(int palilloIzq, int palilloDcha){
        this.palilloIzq = palilloIzq;
        this.palilloDcha = palilloDcha;

        tieneIzq = false;
        tieneDcha = false;
    }

    public Filosofo(String nombre, int palilloIzq, int palilloDcha){
        this.nombre = nombre;
        this.palilloIzq = palilloIzq;
        this.palilloDcha = palilloDcha;

        tieneIzq = false;
        tieneDcha = false;
    }

    public String getNombre() {
        return nombre;
    }

    public int getPalilloIzq() {
        return palilloIzq;
    }

    public int getPalilloDcha() {
        return palilloDcha;
    }

    public boolean isTieneIzq() {
        return tieneIzq;
    }

    public void setTieneIzq(boolean tieneIzq) {
        this.tieneIzq = tieneIzq;
    }

    public boolean isTieneDcha() {
        return tieneDcha;
    }

    public void setTieneDcha(boolean tieneDcha) {
        this.tieneDcha = tieneDcha;
    }

    @Override
    public String toString() {
        return "Filosofo{" +
                "palilloIzq=" + palilloIzq +
                ", palilloDcha=" + palilloDcha +
                '}';
    }
}
