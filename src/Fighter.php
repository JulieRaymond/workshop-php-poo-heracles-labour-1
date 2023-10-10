<?php

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life = self::MAX_LIFE;

    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function Fight(Fighter $opponent)
    {
        // Dégâts de l'attaquant (nombre aléatoire entre 1 et sa force)
        $damage = rand(1, $this->strength);

        // Défense de l'attaqué 
        $defense = $opponent->dexterity;

        // Dégâts réels = dégâts de l'attaquant - défense de l'attaqué
        $netDamage = $damage - $defense;

        // Vérifie que les dégâts ne sont pas négatifs
        $netDamage = max($netDamage, 0);

        // Met à jour les points de vie de l'attaqué en soustrayant les dégâts nets
        $opponent->life -= $netDamage;

        // Assure que la vie de l'attaqué ne tombe pas en dessous de zéro
        $opponent->life = max($opponent->life, 0);

        echo $this->name . " attaque " . $opponent->name . " et lui inflige " . $netDamage . " points de dégâts." . PHP_EOL;
        echo "Il reste à " . $opponent->name . " " . $opponent->life . " points de vie 💙." . PHP_EOL;
    }

    public function isAlive(): bool
    {
        return $this->life > 0;
    }
}
