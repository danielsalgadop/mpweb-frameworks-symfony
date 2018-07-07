
Esccribir Pablo
- he querido ser explicito en nombres. $EntityManager en vez de $em | $createOwnerCommandHandler en vez de $handler | $createOwnerCommand en vez de $command. Ya que asi me resulta más facil de ver qué y donde estoy haciendo cada cosa. Cuando tenga práctica iré siendo más generalista en la semántica


- No he tenido tiempo de hacer un Domain\Validator tal que:
    + clearString
    + clearInt
    + validName


- No he añadiod Excepciones de Dominio para Product

KNOWN BUGS
- Validación de price un tanto incoherente: He añadido restricción de que price != 0. Pero tampoco acepta valores de 0.1
