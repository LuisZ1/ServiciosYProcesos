package Filosofos;

import java.util.ArrayList;

public class GestionFilosofos {

    public ArrayList<Boolean> generarListaPalillos(int nFilosofos){
        ArrayList<Boolean> listaPalillos = new ArrayList<Boolean>();

        for(int i = 0; i<nFilosofos; i++){
            listaPalillos.add(false);
        }

        return listaPalillos;
    }

    public ArrayList<Filosofo> generarListaFilosofos(int nFilo, ArrayList<Boolean> listaPalillos){
        ArrayList<Filosofo> listaFilosofos = new ArrayList<Filosofo>();
        int i = nFilo - 1;
        int j = 1;
        int id = 1;

        listaFilosofos.add(new Filosofo(id, i, 0, listaPalillos));
        id++;

        for ( i = 0; i < nFilo - 2; i++){
            listaFilosofos.add(new Filosofo(id, i, j, listaPalillos));
            j++;
            id++;
        }

        listaFilosofos.add(new Filosofo(id, j, 0, listaPalillos));

        return listaFilosofos;
    }



}
