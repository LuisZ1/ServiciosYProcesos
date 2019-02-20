package Filosofos;

import java.util.ArrayList;

public class Main {

    public static void main (String[] args){

        GestionFilosofos gestor = new GestionFilosofos();
        ArrayList<Filosofo> listaFilosofos = new ArrayList<Filosofo>();

        listaFilosofos = gestor.generarListaFilosofos(10);

    }
}
