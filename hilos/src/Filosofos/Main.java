package Filosofos;

import java.util.ArrayList;
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class Main {

    public static void main (String[] args){

        GestionFilosofos gestor = new GestionFilosofos();
        int numeroFilosofos = 10;

        ArrayList<Filosofo> listaFilosofos = new ArrayList<Filosofo>();
        ArrayList<Boolean> listaPalillos = new ArrayList<Boolean>();

        listaPalillos = gestor.generarListaPalillos(numeroFilosofos);
        listaFilosofos = gestor.generarListaFilosofos(numeroFilosofos, listaPalillos);

        for (Boolean f : listaPalillos){
            System.out.println(f.toString());
        }

        System.out.println("\n");

        for (Filosofo f : listaFilosofos){
            System.out.println(f.toString());
        }

        ExecutorService executorService = Executors.newFixedThreadPool(listaFilosofos.size());
        for (Filosofo p : listaFilosofos) {
            executorService.submit(p);
        }

    }
}
