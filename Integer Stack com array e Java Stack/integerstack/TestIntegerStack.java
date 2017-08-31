package integerstack;

import java.util.Scanner;

public class TestIntegerStack {

    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        Integer[] names = {1, 2, 3, 4, 5, 0, 6};
        PilhaInteiros pilha = new PilhaInteiros(names.length);
        Integer item;
        String resposta;
        System.out.println("Preenchendo a pilha:");
        for (int i = 0; i < names.length; i++) {
            if (names[i] != null) {
                pilha.push(names[i]);
                System.out.print("\tInserindo o número : " + pilha.peek() + "\n");
            } else {
                System.out.println("Impossível inserir elementos na pilha, pois não há elementos no array!");
            }
        }
        System.out.println("O menor atualmente é: " + pilha.min());
        pilha.pop();
        System.out.println("Quem está no topo da pilha: " + pilha.peek());
        System.out.println("O menor: " + pilha.min());
        pilha.pop();
        System.out.println("Quem está no topo da pilha: " + pilha.peek());
        System.out.println("O menor atualmente é: " + pilha.min());
        do {
            System.out.println("Deseja inserir mais algum item? ()");
            resposta = entrada.next();
            if (resposta.equals("Sim") || resposta.equals("SIM") || resposta.equals("S") || resposta.equals("s")) {
                System.out.println("Qual número irá para a pilha?");
                item = entrada.nextInt();
                pilha.push(item);
                System.out.println("O menor atualmente é: " + pilha.min());
            }
        } while (resposta.equals("Sim") || resposta.equals("SIM") || resposta.equals("S") || resposta.equals("s"));
        do {
            System.out.println("Deseja remover mais algum item? ()");
            resposta = entrada.next();
            if (resposta.equals("Sim") || resposta.equals("SIM") || resposta.equals("S") || resposta.equals("s")) {
                System.out.println("Qual número irá sair da pilha?");
                pilha.pop();
                if (pilha.min() >= 0) {
                    System.out.println("O menor atualmente é: " + pilha.min());
                } else {
                    System.out.println("Não há menor!\nA pilha está vazia!");
                }
            }
        } while (resposta.equals("Sim") || resposta.equals("SIM") || resposta.equals("S") || resposta.equals("s"));
    }
}
