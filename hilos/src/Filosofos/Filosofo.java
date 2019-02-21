package Filosofos;

import java.util.ArrayList;
import java.util.Random;

public class Filosofo implements  Runnable{

    private int id;
    private String nombre;
    private int palilloIzq;
    private int palilloDcha;
    private ArrayList<Boolean> listaPalillos;

    private boolean tieneIzq;
    private boolean tieneDcha;

    public Filosofo(int id, int palilloIzq, int palilloDcha, ArrayList<Boolean> listaPalillos) {
        this.id = id;
        this.palilloIzq = palilloIzq;
        this.palilloDcha = palilloDcha;
        this.listaPalillos = listaPalillos;

        tieneIzq = false;
        tieneDcha = false;
    }

    public Filosofo(String nombre, int palilloIzq, int palilloDcha) {
        this.nombre = nombre;
        this.palilloIzq = palilloIzq;
        this.palilloDcha = palilloDcha;

        tieneIzq = false;
        tieneDcha = false;
    }

    public void pensar() throws InterruptedException {
        int maxTemp = 500, minTemp = 300;
        Random ran = new Random();
        long temp = (long) minTemp + ran.nextInt(maxTemp - minTemp + 1);

        System.out.println(id+") empiezo a pensar");
        Thread.sleep(temp);
        System.out.println(id+") termino de pensar");
    }

    public void pasarTiempo() throws InterruptedException {
        int maxTemp = 500, minTemp = 400;
        Random ran = new Random();
        long temp = (long) minTemp + ran.nextInt(maxTemp - minTemp + 1);

        System.out.println(id+") Empiezo a dejar pasar tiempo");
        Thread.sleep(temp);
        System.out.println(id+") Termino de dejar pasar tiempo");
    }

    public void comer(/*ArrayList<Boolean> listaPalillos*/) throws InterruptedException {

        while(true) {

            if (!listaPalillos.get(palilloIzq)) {
                listaPalillos.set(palilloIzq, true); //marcar palillo IZQ cogido
                System.out.println(id+") cojo palillo: "+palilloIzq);
                if(!listaPalillos.get(palilloDcha)){
                    listaPalillos.set(palilloDcha, true); //marcar palillo DCHA cogido
                    System.out.println(id+") cojo palillo: "+palilloDcha);
                    System.out.println(id+") empiezo a comer");
                    pasarTiempo();
                    listaPalillos.set(palilloIzq, false);
                    System.out.println(id+") ========= suelto palillo: "+palilloIzq);
                    listaPalillos.set(palilloDcha, false);
                    System.out.println(id+") ========= suelto palillo: "+palilloDcha);

                    System.out.println(id+") xxxxxxxxxxxxxxxxxx termino de comer xxxxxxxxxxxxxxxxxx");
                    pasarTiempo();
                } else {
                    listaPalillos.set(palilloIzq, false);
                    System.out.println(id+") ///////////////////  suelto palillo: "+palilloIzq);
                    pasarTiempo();
                }
            } else {
                pensar();
            }

        }
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
                "id=" + id +
                ", palilloIzq=" + palilloIzq +
                ", palilloDcha=" + palilloDcha +
                '}';
    }

    @Override
    public void run() {
        try {
            pensar();
            comer();
        } catch (Exception e) {
//            logger.error(e.getMessage(), e);
        }
    }
}
