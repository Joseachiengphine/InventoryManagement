<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CustomerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'SHOP';


    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        Card::make()
        ->schema([
            Fieldset::make('Personal Details')
                        ->schema([
        Forms\Components\TextInput::make('name')
        ->required()
        ->maxLength(255),
        Forms\Components\TextInput::make('email')
        ->email()
        ->required()
        ->maxLength(255),
        Forms\Components\TextInput::make('phoneNumber')
        ->tel()
        ->required()
        ->maxLength(255),
        
                            ])
                            ->columns(2)
                            ->inlineLabel(),
                        ]),
        Card::make()
        ->schema([
                Fieldset::make('Address Details')
                ->schema([
        Forms\Components\TextInput::make('country')
        ->required()
        ->maxLength(255),
        Forms\Components\TextInput::make('address')
        ->required()
        ->maxLength(255),
        ])
                ]),

        Card::make()
        ->schema([
                Fieldset::make('Payment Details')
                     ->schema([
                        Select::make('paymentmethod')
                        ->options([
                        'mpesa' => 'MPESA',
                        'bank' => 'BANK',
                        'cheque' => 'CHEQUE',
                        ]),
                        Forms\Components\TextInput::make('recievables')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                        ->required()
                        ->maxLength(65535),
                        ])
                                                 ])
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('email')
                ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('phoneNumber'),
                Tables\Columns\TextColumn::make('description')
                ->searchable(),
                Tables\Columns\TextColumn::make('country')
                ->searchable()
                ->toggleable()
                ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
